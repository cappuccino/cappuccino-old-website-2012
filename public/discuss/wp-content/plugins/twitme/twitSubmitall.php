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
### Load WP-Config File If This File Is Called Directly
if (!function_exists('set_option')) {
 if (file_exists ('../wp-config.php'))
	 require_once('../wp-config.php'); 
 else
    require_once('../../../wp-config.php'); 
}

 
/*
** Returns an array containing posts_id that still to submit or false
** if everything has been submitted.
*/
function twitme_openQue ()
{
	$aPosts          = get_posts();
	$aPostsSubmitted = unserialize (TWITME_SUBMITTED);
	$aToSend         = array ();
	
	if (!is_array ($aPostsSubmitted))
	 $aPostsSubmitted = array();

	foreach ($aPosts as $aPost)
	{
		if ($aPost->post_status == 'publish')
		{
			if (!in_array ($aPost->ID,  $aPostsSubmitted))
			{
				$aToSend [] = $aPost->ID;
			}
		}
		
	};
	
    if (sizeof ($aToSend) > 0)
	  return $aToSend;
	return false;
}

/*
** Submit all posts that have not been submitted yet
** to Twitter.
*/
function twitme_submitAll ()
{
	$aPosts          = get_posts();
	if (sizeof ($aPosts) > 0)
	{
		foreach ($aPosts as $key => $val)
		{
			twitme_notify_twitter ($aPosts[$key]->ID, true);
			echo sprintf (__('Submitting <strong>%s</strong><br />',TWITME_TRANSLATION_DOMAIN), $aPosts[$key]->post_title);
		}
	}
}
?>