<?php
/*  Copyright YEAR  PLUGIN_AUTHOR_NAME  (email : info@phpvrouwen.nl)

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


/*
	Plugin Name: Twitme
	Plugin URI:http://www.phpvrouwen.nl/twitme
	Description: This plugin allows you to automatically post your new posts on the twitter website.
	Version: 1.5.2
	Author: Johnny Mast
	Author URI: http://www.phpvrouwen.nl
*/


$sUsername           = '';
$sPassword           = '';
$bHaveUser           = false;
$sPostMessage        = __("New Blog Post on %BLOGNAME% you can find it here %POSTURL%", TWITME_TRANSLATION_DOMAIN); 
$sNewFollowerMessage = __("Thank you for following me.", TWITME_TRANSLATION_DOMAIN);
$bNotifyNewFollowers = 'on';
$sMethod             = 'template';
$sSubmitted          = '';
$sNotifiedFollowers  = '';
$bAutoPost           = 'on';
$bShortUrls          = 'off';

add_option('twitme_username', '', '', FALSE);
add_option('twitme_password', '', '', FALSE);
add_option('twitme_postmessage', '', '', FALSE);
add_option('twitme_autopost', '', 'on', FALSE);
add_option('twitme_method', '', 'template', FALSE);
add_option('twitme_submitted', '', '', FALSE);
add_option('twitme_newfollower_message', '', FALSE);
add_option('twitme_newfollower_notify', 'on', FALSE);
add_option('twitme_notified_followers', '', FALSE);
add_option('twitme_shorturls', '', FALSE);


if (get_option('twitme_username') <> '')            $sUsername    = get_option('twitme_username');
if (get_option('twitme_password') <> '')            $sPassword    = get_option('twitme_password');
if (strlen('sPassword') > 0)                        $bHaveUser    = true;
if (get_option('twitme_postmessage') <> '')         $sPostMessage = get_option('twitme_postmessage');
if (get_option('twitme_newfollower_message') <> '') $sNewFollowerMessage = get_option('twitme_newfollower_message');
if (get_option('twitme_newfollower_notify') <> '')  $bNotifyNewFollowers = get_option('twitme_newfollower_notify');
if (get_option('twitme_notified_followers') <> '')  $sNotifiedFollowers = get_option('twitme_notified_followers');
if (get_option('twitme_method') <> '')              $sMethod      = get_option('twitme_method');
if (get_option('twitme_submitted') <> '')           $sSubmitted   = get_option('twitme_submitted');
if (get_option('twitme_autopost') <> '')            $bAutoPost    = get_option('twitme_autopost');
if (get_option('twitme_shorturls') <> '')           $bShortUrls   = get_option ('twitme_shorturls');

define (TWITME_RELEASE, TRUE);
define (TWITME_VERSION, '1.5.1');
define (TWITME_PATH, '../'.PLUGINDIR.'/twitme/');
define (TWITME_TRANSLATEDIR, PLUGINDIR.'/twitme/translation');
define (TWITME_USER,     $sUsername);
define (TWITME_PASSWORD, $sPassword);
define (TWITME_HAVEUSER, $bHaveUser);
define (TWITME_AUTOPOST, $bAutoPost);
define (TWITME_PLUGINURL, get_bloginfo ( 'wpurl' ).'/wp-content/plugins/twitme/');
define (TWITME_POSTMESSAGE, $sPostMessage);
define (TWITME_NEWFOLLOWER_MESSAGE, $sNewFollowerMessage);
define (TWITME_NEWFOLLOWER_NOTIFY,  $bNotifyNewFollowers);
define (TWITME_NOTIFIED_FOLLOWERS,  $sNotifiedFollowers); 
define (TWITME_METHOD,     $sMethod);
define (TWITME_USERAGENT,  'Twitme for WordPress v'.TWITME_VERSION);
define (TWITME_SHORTEDTO,  120);
define (TWITME_MAXLENGTH,  140);
define (TWITME_SUBMITTED,  $sSubmitted);
define (TWITME_TRANSLATION_DOMAIN, 'twitme');
define (TWITME_MAXFOLLOWERS_PER_ROW,3);
define (TWITME_SHORTURLS, $bShortUrls);

function init_translation()
{	
	load_plugin_textdomain(TWITME_TRANSLATION_DOMAIN, TWITME_TRANSLATEDIR);
}

if (!function_exists ('print_rn'))
{
	function print_rn ($p_mData)
	{
		echo '<pre>';
		print_r ($p_mData);
		echo '</pre>';
	}
}
add_action('init', 'init_translation');

if (!function_exists ('json_encode')) 
 require_once 'support/json.php';

require_once 'twitTimeurlclass.php';
require_once 'twitclass.php';
require_once 'twitMenus.php';
require_once 'twitFilters.php';


?>
