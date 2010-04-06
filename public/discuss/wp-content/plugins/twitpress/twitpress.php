<?php
/*
Plugin Name: Twitpress
Plugin URI: http://www.thomaspurnell.com/twitpress/
Description: Announces new posts on twitter
Version: 0.3.2
Author: Tom Purnell
Author URI: http://www.thomaspurnell.com
*/
/*  Copyright 2007, 2008  Thomas Purnell  (email : tom@thomaspurnell.com)

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
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  
02110-1301  USA
*/

//Hooks and wordpress options
register_activation_hook( __FILE__, 'twitpress_install' );
add_action( 'delete_post', 'twitpress_db_delete_post' );
add_action( 'admin_menu', 'twitpress_add_menu' );
add_action( 'wp_insert_post', 'twitpress_run' );
add_option( 'twitpress_uid', '', 'Twitter user name', 'yes' );
add_option( 'twitpress_password', '', 'Twitter password', 'yes' );
add_option( 'twitpress_message', 'New blog entry: [title] [permalink]', 'Twitpress message format', 'yes' );

//Runs when a post record is inserted into the database
function twitpress_run( $postID ) {
	//get the post
	$post = get_post( $postID );

	//we only want to do anything if the post was not previously twittered
	if ( !twitpress_was_twittered( $postID ) ){
		//Update the post to reflect it's current status
		twitpress_db_update_post( $postID, $post->post_status );
	}
	//process the posts, including twittering newly published posts
	twitpress_process_posts();
}

//Install the twitpress database
function twitpress_install() {

	global $wpdb;
	$table_name = "twitpress";
	
	twitpress_db_drop_table();

   	if( $wpdb->get_var( "SHOW TABLES LIKE '$table_name'" ) != $table_name ) {
		$sql = "CREATE TABLE " . $table_name . " (
	 	 id mediumint(9) NOT NULL,
	 	 status enum( 'publish', 'draft', 'private', 'static', 'object', 'attachment', 'inherit', 'future', 'twittered' ) NOT NULL,
	 	 UNIQUE KEY id (id)
		);";

		if (version_compare($wp_version, '2.3', '>='))		
			require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
		else
			require_once(ABSPATH . 'wp-admin/upgrade-functions.php');

		dbDelta( $sql );

		add_option( "twitpress_db_version", "0.3.2" );
	}

	//Populate table to avoid twittering previously published posts when they are edited
	$sql = "SELECT ID, post_status from " . $wpdb->posts;
	$posts = $wpdb->get_results( $sql, OBJECT );
	foreach ($posts as $post){
		if ( $post->post_status == "publish" ){
			twitpress_db_update_post( $post->ID, "twittered" );
		} else {
			twitpress_db_update_post( $post->ID, $post->post_status );
		}
	}
}

//Delete twitpress table
function twitpress_db_drop_table() {
	global $wpdb;
	$table_name = "twitpress";
   	if( $wpdb->get_var( "SHOW TABLES LIKE '$table_name'" ) != $table_name ) {
		$sql = "DROP TABLE " . $table_name;
	}

	if (version_compare($wp_version, '2.3', '>='))		
		require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
	else
		require_once(ABSPATH . 'wp-admin/upgrade-functions.php');

	dbDelta( $sql );
}

//Add / update a twitpress record of a post
function twitpress_db_update_post( $postID, $status ){
	global $wpdb;
	$table_name = "twitpress";

	//delete any old record of this entry (could use update instead)
	twitpress_db_delete_post( $postID );

	//insert the new version of the record
	$query = "INSERT INTO " . $table_name .
		" (id, status) " .
		"VALUES (" . $wpdb->escape( $postID ) . ", '" .
		$wpdb->escape( $status ) . "')";
	return $wpdb->query( $query );
}

//Get a wordpress post status
function twitpress_db_get_post_status( $postID ){
	global $wpdb;
	$table_name = "twitpress";

	//find post by id
	$query = "SELECT id, status from " . $wpdb->posts .
		" WHERE id = " . $wpdb->escape( $postID );
	return $wpdb->get_var( $query, 1 );
}

//Check if a post was previously twittered
function twitpress_was_twittered( $postID ){
	global $wpdb;
	$table_name = "twitpress";
	
	$query = "SELECT id, status from " . $table_name . 
		" WHERE id = " . $wpdb->escape( $postID );

	return $wpdb->get_var( $query, 1 ) == 'twittered'; 
}

//Delete a twitpress post status (n.b this doesnt delete any wordpress posts :) )
function twitpress_db_delete_post( $postID ){
	global $wpdb;
	$table_name = "twitpress";

	$query = "DELETE FROM " . $table_name .
		" WHERE id like " . $wpdb->escape( $postID );
	return $wpdb->query( $query );
}

//Process posts currently stored in the twitpress database table
function twitpress_process_posts() {
	global $wpdb;
	$table_name = "twitpress";

	$query = "SELECT * FROM " . $table_name;

	//get the currently stored posts
	$tp_rows = $wpdb->get_results( $query, ARRAY_A );

	//for each entry in the twitpress table
	foreach( $tp_rows as $row ){
		$tp_wp_status = $row["status"]; 
		//if the entry has been published, we can publish to twitter and mark
		//that this post has been twittered
		if ( $tp_wp_status == "publish" ){
			twitpress_publish( $row["id"] );
			twitpress_db_update_post( $row["id"], 'twittered' );
		}
	}
}

//Add the twitpress menu to the management page
function twitpress_add_menu() {
	add_management_page( 'Twitpress', 'Twitpress', 8, 'twitpressoptions', 'twitpress_options_page' );
}

//Options page code and html
function twitpress_options_page() {
	global $wpdb;
	$table_name = "twitpress";
	$username = get_option( 'twitpress_uid' );
	$password = get_option( 'twitpress_password' );
	$message = get_option( 'twitpress_message' );
	$submitFieldID = 'twitpress_submit_hidden';
	if ( $_POST[ $submitFieldID ] == 'Y' ) {
		update_option( 'twitpress_uid', $_POST[ 'twitpress_form_username' ] );
		update_option( 'twitpress_password', str_rot13($_POST[ 'twitpress_form_password' ]) );
		update_option( 'twitpress_message', $_POST[ 'twitpress_form_message' ] );
	?>
		<div class="updated"><p><strong><?php _e('Options saved.', 'mt_trans_domain' ); ?></strong></p></div>
	<?php

	}

	echo '<div class="wrap">';
	echo "<h2>" . __( 'Twitpress Plugin Options', 'mt_trans_domain' ) . "</h2>"; ?>

	<form name="twitpress_form" method="post" action="<?php echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI'] ); ?>">
	<input type="hidden" name="twitpress_submit_hidden" value="Y" />
	<p><h3>Username</h3><input type="text" 
name="twitpress_form_username" value="<?php echo ( get_option ( 'twitpress_uid' ) ); ?>" /></p>
	<p><h3>Password</h3><input type="password" 
name="twitpress_form_password" value="<?php echo str_rot13( get_option( 'twitpress_password' ) ); ?>" /></p>
	<p><h3>Message format</h3><textarea 
name="twitpress_form_message"  /><?php echo (get_option('twitpress_message')); ?></textarea></p>
<p class="submit"><input type="submit" name="Submit" 
value="<?php _e( 'Update Options', 'mt_trans_domain' ) ?>" /></p>
<p>The following message format tags are supported:
<ul>
<li><strong>[title]</strong> is replaced with the post title</li>
<li><strong>[permalink]</strong> is replaced with the post's permalink using your permalink format <em>(domain.com/index.php?/twitpress)</em></li>
<li><strong>[link]</strong> is replaced with a default style link to the post (depreciated, not recommended) <em>(domain.com/index.php?p=1)</em></li>
</ul>
</p>
	</form><!--[Coming Soon]
	<hr />
	<p>Twitpress stores it's data in a table ( '<? echo $table_name ?>' on this wordpress installation ) in your wordpress database. If you want to delete this table (and cause twitpress to stop working in the process, click here. There is no undo. You will need to deactivate and then activate twitpress again, regenerating this table, before twitpress will work again.</p>
	<form action=" <? echo __FILE__ ?> ">
		<p class="submit"><input type="submit" value="Drop table" /></p>
	</form>
-->
	</div>



	<?php
}

//Publishes a tweet given only the postID
function twitpress_publish( $postID ){	
	//get the post
	$post = get_post( $postID );
	
	//Now redundant check to make sure the post has been published

	if ( $post->post_status == "publish" ){
		$message = twitpress_get_message( $postID );
		twitpress_postMessage( get_option( 'twitpress_uid' ), get_option( 'twitpress_password' ), $message );
	}
}

//Converts a wordpress post into a string with user formatting for twitter posting
function twitpress_get_message( $postID ){
	$proto = get_option( 'twitpress_message' );
	$post = get_post( $postID );
	$proto = str_replace( "[title]", $post->post_title, $proto );
	$proto = str_replace( "[permalink]", $post->guid, $proto );
	$proto = str_replace( "[link]", get_option( 'home' )."?p=".$postID, $proto );
	return $proto;
}

//Standard curl function, handles actual submission of message to twitter
function twitpress_postMessage( $twitter_username, $twitter_password, $message ){
	$url = 'http://twitter.com/statuses/update.xml';
	$curl_handle = curl_init();
	curl_setopt( $curl_handle, CURLOPT_URL, "$url" );
	curl_setopt( $curl_handle, CURLOPT_CONNECTTIMEOUT, 2 );
	curl_setopt( $curl_handle, CURLOPT_RETURNTRANSFER, 1 );
	curl_setopt( $curl_handle, CURLOPT_POST, 1 );
	curl_setopt( $curl_handle, CURLOPT_POSTFIELDS, "status=$message&source=twitpress" );
	curl_setopt( $curl_handle, CURLOPT_USERPWD, "$twitter_username:".str_rot13( $twitter_password ) );
	$buffer = curl_exec( $curl_handle );
	curl_close( $curl_handle );
}

//TODO:
//Investigate removal of curl deps, unconfuse various checks occuring (will probably need a rewrite)
//Add drop table functionality. Consider storing only twittered entries in database and filtering non relevant
//items.
?>
