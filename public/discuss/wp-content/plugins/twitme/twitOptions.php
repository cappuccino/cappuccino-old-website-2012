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
require_once 'twitclass.php';
require_once 'twitSubmitall.php';


### Load WP-Config File If This File Is Called Directly
if (!function_exists('set_option')) {
	require_once('../../../wp-config.php');
}

$sUsername = '';
$sPassword = '';
if (isset ($_POST['cmd']) && $_POST['cmd'] == 'submit_all')
{
	
	$mQue            = twitme_openQue();
	$aSubmitted      = unserialize (TWITME_SUBMITTED);
	
	if (!is_array ($aSubmitted)) $aSubmitted      = array();
	
	if (is_array($mQue)) {
		foreach ($mQue as $post_id)
		{
		  twitme_notify_twitter ($post_id);
		  $aSubmitted[] = $post_id;
		  sleep(2);
		}
	}
	update_option ('twitme_submitted', serialize($aSubmitted));
	
	echo __("The messages have been send to Twitter");
	exit;
	
	
} else
if (isset ($_POST['cmd']) && $_POST['cmd'] == 'resend')
{
	twitme_notify_twitter ($_POST['postid'], true);
	
	echo __('Repost successful', TWITME_TRANSLATION_DOMAIN);
	exit;
} else
if (isset ($_GET['username']) && isset ($_GET['password']))
{
	$sUsername = urldecode ($_GET['username']);
	$sPassword = urldecode ($_GET['password']);
	
	$oInstance = new twitclass();
	
	if ($oInstance->login ($sUsername, $sPassword) == TRUE)
	{
		echo __('Logged in successfully', TWITME_TRANSLATION_DOMAIN);
	} else
	echo __('Error: could not login to Twitter.', TWITME_TRANSLATION_DOMAIN);
	
} else
{
	if (isset ($_POST['username']) && isset ($_POST['password']))
	{
		switch ($_POST['cmd'])
		{
			case 'store':

			 $sUsername = urldecode($_POST['username']);
			 $sPassword = urldecode($_POST['password']);
			 $sPostMessage = urldecode($_POST['message']);
			 $sFollowersMessage = urldecode($_POST['followersmessage']);

			 add_option('twitme_username', $sUsername, '', FALSE);
			 add_option('twitme_password', $sPassword, '', FALSE);
			 add_option('twitme_postmessage', $sPostMessage, '', FALSE);
			 add_option('twitme_haveuser', TRUE, '', FALSE);
			 add_option('twitme_method', $_POST['method'], '', FALSE);
			 add_option('twitme_newfollower_notify', $_POST['notifyfollowers'], '', FALSE);
			 add_option('twitme_newfollower_message', $sFollowersMessage, '', FALSE);
			 add_option('twitme_autopost', $_POST['autopost'], '', FALSE);
			 add_option('twitme_shorturls', $_POST['shorturls'], '', FALSE);
			break;
			
			
			case 'update':
			 $sUsername = urldecode($_POST['username']);
			 $sPassword = urldecode($_POST['password']);
			 $sPostMessage = urldecode($_POST['message']);
			 $sFollowersMessage = urldecode($_POST['followersmessage']);
			  
			 update_option('twitme_username', $sUsername);
			 update_option('twitme_password', $sPassword);
			 update_option('twitme_postmessage', $sPostMessage);
			 update_option('twitme_newfollower_notify', $_POST['notifyfollowers']);
			 update_option('twitme_newfollower_message', $sFollowersMessage);
		  	 update_option('twitme_method', $_POST['method']);
			 update_option('twitme_autopost', $_POST['autopost']);
			 update_option('twitme_shorturls', $_POST['shorturls']);
			break;
		}
		echo __('Your Twitme settings are saved.',TWITME_TRANSLATION_DOMAIN);	
		exit;
	}
}

if (empty ($sUsername) || empty ($sPassword))
{
	 header("HTTP/1.1 404 Not Found");
	 exit;
}
?>


