<?php
/*  Copyright 2008  Johnny Mast  (email : info@phpvrouwen.nl)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

if (TWITME_AUTOPOST == 'on')
 add_filter ('publish_post', 'twitme_notify_twitter', 1,1);

function twitme_notify_twitter ($postID, $force = false)
{
	$aData = null;
	$aData = get_post ($postID);
	
	if ($aData) 
	{
		$aData ->post_content =  strip_tags ($aData ->post_content);
		
		if (TWITME_HAVEUSER)
		{
			$oInstance = new twitclass();
			$oTest     = new twitTimeUrl();
			$oInstance ->login (TWITME_USER, TWITME_PASSWORD);
	
			switch (TWITME_METHOD)
			{
				case 'template':
				 $sMessage  = TWITME_POSTMESSAGE;
				 $sBlogname = get_bloginfo(false);
				 $sTitle    = 'New Blog post "'.$aData->post_title.'" ';
				 $sBlogUrl  = get_bloginfo ( 'wpurl' );
				 
				 
				 if (TWITME_SHORTURLS == 'on')
				   $sUrl  	= $oTest->getShortUrl (get_permalink($aData->ID));
				 else
				   $sUrl    = get_permalink($aData->ID);
				  
			 
				 $sMessage  = str_replace ('%BLOGURL%',   $sBlogUrl, $sMessage);			 	 
				 $sMessage  = str_replace ('%BLOGNAME%',  $sBlogname, $sMessage);
				 $sMessage  = str_replace ('%POSTURL%',   $sUrl, $sMessage);
				 $sMessage  = str_replace ('%POSTTITLE%', $aData->post_title, $sMessage);
				 
			     if (strlen ($sMessage) > TWITME_MAXLENGTH)
				 {
					 $iOldLength = strlen ($sMessage); 
					 $sMessage   = substr ($sMessage, 0, TWITME_SHORTEDTO);
					 
					 $sTitle     =  sprintf (__(' New Blog post %s%s', TWITME_TRANSLATION_DOMAIN), $aData->post_title, ' ');
                     $sMessage .= ' '.$sUrl;
					 
 					 if ($iOldLength > TWITME_SHORTEDTO)
					  $sMessage .= '...';					
				 }
				break;
				
				default: /* summary */
				 $sMessage   = $aData->post_content;
				 $iOldLength = strlen ($sMessage); 
				 $sMessage   = substr ($sMessage, 0, TWITME_SHORTEDTO);
				
				 
				 if (TWITME_SHORTURLS == 'on')
				   $sUrl  	= $oTest->getShortUrl (get_permalink($aData->ID));
				 else
				   $sUrl    = get_permalink($aData->ID);				
				
				 $sTitle    = sprintf (__(' New Blog post %s %s', TWITME_TRANSLATION_DOMAIN), $aData->post_title, ' ');
			     $sMessage  .= $sTitle;
				
				 if (strlen ($sMessage) > TWITME_SHORTEDTO)
				 {
				   $sMessage = substr ($sMessage, 0, TWITME_SHORTEDTO-(3 + strlen ($sUrl)));
				   $sMessage .= '... ';
				 }
				 
				 $sMessage .= ' '.$sUrl;
				break;
			}
			
			$aPostsSubmitted = unserialize (TWITME_SUBMITTED);
			if (!is_array ($aPostsSubmitted)) $aPostsSubmitted = array();
			
			if (TWITME_RELEASE)
			{
			   if (!$force)
			   {
				 /*
				 ** This ifixes the bug prior to version 1.4 where 
				 ** some posts where double posted to Twitter.
				 */ 
				 if (!in_array ($postID, $aPostsSubmitted))
			        $oInstance ->doPost ($sMessage);
			   } else
			   $oInstance ->doPost ($sMessage);
			 
			 //twitme_notify_followers ();
			}
			
			/*
			** Safe the postes submitted to Twitter for later use in the Manage section
			*/
			array_push ($aPostsSubmitted, $postID);
			update_option ('twitme_submitted', serialize($aPostsSubmitted));
		}
	}
}


function twitme_notify_followers()
{
	
	if (TWITME_NEWFOLLOWER_NOTIFY == 'off') 
	 return false;
	 
	
	/* Create a bridge between twitter and us and request the followers*/
	$oInstance  = new twitclass();
	$oInstance ->login (TWITME_USER, TWITME_PASSWORD);	
	$aFollowers = $oInstance->getFollowers();
	
	$aNotifiedFollowers = unserialize (TWITME_NOTIFIED_FOLLOWERS);
	$aNotifyThese = array();
	
	$aNotifiedFollowers = ($aNotifiedFollowers == FALSE) ?  array() : $aNotifiedFollowers;
	
	if (sizeof ($aFollowers) > 0 && is_array ($aNotifiedFollowers))
	{
		foreach ($aFollowers as $aFollower)
		{
			if (!in_array ($aFollower->id,  $aNotifiedFollowers))
			  $aNotifyThese [] = $aFollower->id;
		}
	}

	if (sizeof ($aNotifyThese) > 0)
	{
		foreach ($aNotifyThese as $iFollower)
		{
			$oInstance->sendDirectMessage ($iFollower, TWITME_NEWFOLLOWER_MESSAGE);
			$aNotifiedFollowers [] = $iFollower;
		}
		
		if (sizeof ($aNotifiedFollowers) >0)
		  update_option ('twitme_notified_followers', serialize($aNotifiedFollowers));
	} else
	return FALSE;
	
}
?>