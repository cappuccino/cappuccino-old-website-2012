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

/* Add the action to add new menu options */
add_action('admin_menu', 'twitme_add_pages');


function twitme_add_pages() {
	
	
    /*
	** Under settings we will add the "TwitMe Options" 
	*/
    add_options_page('TwitMe', __('TwitMe Options',TWITME_TRANSLATION_DOMAIN), 8, 'twitmeoptions', 'twiteme_load_settings');

 	/*
	** And under manage a option to Manage posts send to twitter.
	*/
    add_management_page('Test Manage', __('TwitsMe`s',TWITME_TRANSLATION_DOMAIN), 8, 'twitmemanage', 'twiteme_mannage_twits');
}

function twiteme_load_settings()
{
	require_once TWITME_PATH.'pages/settings.php';
}

function twiteme_mannage_twits()
{
	$oInstance = new twitclass();
	$oInstance ->login (TWITME_USER, TWITME_PASSWORD);
	$aFollowers = $oInstance->getFollowers() ;
	$aLastPosts = $oInstance->getLastPosts() ;
    require_once TWITME_PATH.'pages/mannage.php';
}
?>
