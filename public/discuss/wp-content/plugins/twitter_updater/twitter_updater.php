<?php
/*
Plugin Name: Twitter updater
Plugin URI: http://blog.victoriac.net/?p=87
Description: Updates Twitter when you create a new blog or publish one
Version: 1.1
Author: Victoria Chan
Author URI: http://blog.victoriac.net/?p=87
*/


function vc_doTwitterAPIPost($twit, $twitterURI) {
	$host = 'twitter.com';
	$port = 80;
	$fp = fsockopen($host, $port, $err_num, $err_msg, 10);

	//check if user login details have been entered on admin page
	$thisLoginDetails = get_option('twitterlogin_encrypted');

	if($thisLoginDetails != '')
	{
		if (!$fp) {
			echo "$err_msg ($err_num)<br>\n";
		} else {
			echo $string;
			fputs($fp, "POST $twitterURI HTTP/1.1\r\n");
			fputs($fp, "Authorization: Basic ".$thisLoginDetails."\r\n");
			fputs($fp, "User-Agent: ".$agent."\n");
			fputs($fp, "Host: $host\n");
			fputs($fp, "Content-type: application/x-www-form-urlencoded\n");
			fputs($fp, "Content-length: ".strlen($twit)."\n");
			fputs($fp, "Connection: close\n\n");
			fputs($fp, $twit);
			for ($i = 1; $i < 10; $i++){$reply = fgets($fp, 256);}
			fclose($fp);
		}
		return $response;
	} else {
		//user has not entered details.. Do nothing? Don't wanna mess up the post saving..
		return '';
	}
}

function vc_twit($post_ID)  {
   $twitterURI = "/statuses/update.xml";
   $thisposttitle = $_POST['post_title'];
   $thispostlink = get_permalink($post_ID);
   $sentence = '';
	
	//is new post
	if($_POST['prev_status'] == 'draft'){

		if($_POST['publish'] == 'Publish'){
			// publish new post
			if(get_option('newpost-published-update') == '1'){
				$sentence = get_option('newpost-published-text');
				if(get_option('newpost-published-showlink') == '1'){
					$thisposttitle = $thisposttitle . ' ( ' . $thispostlink . ' )';
				}
				$sentence = str_replace ( '#title#', $thisposttitle, $sentence);
			}
		}else if($_POST['action'] == 'post'){
			// create new post
			if(get_option('newpost-created-update') == '1'){
				$sentence = get_option('newpost-created-text');
				$sentence = str_replace ( '#title#', $thisposttitle, $sentence);
			}
		}else{
			// edit new post
			if(get_option('newpost-edited-update') == '1'){
				$sentence = get_option('newpost-edited-text');
				$sentence = str_replace ( '#title#', $thisposttitle, $sentence);
			}
		}
	}else{
		// is old post
		if(get_option('oldpost-edited-update') == '1'){
			$sentence = get_option('oldpost-edited-text');
			if(get_option('oldpost-edited-showlink') == '1'){
				$thisposttitle = $thisposttitle . ' ( ' . $thispostlink . ' )';
			}
			$sentence = str_replace ( '#title#', $thisposttitle, $sentence);
		}
	}
	
	if($sentence != ''){
		$sendToTwitter = vc_doTwitterAPIPost('status='.$sentence, $twitterURI);
	}
  
   return $post_ID;
}


// ADMIN PANEL - under Manage menu
function vc_addTwitterAdminPages() {
    if (function_exists('add_management_page')) {
		 add_management_page('Twitter Updater', 'Twitter Updater', 8, __FILE__, 'vc_Twitter_manage_page');
    }
 }

function vc_Twitter_manage_page() {
    include(dirname(__FILE__).'/twitter_updater_manage.php');
}


//HOOKIES
add_action ( 'save_post', 'vc_twit');
add_action('admin_menu', 'vc_addTwitterAdminPages');

?>