<?php
require_once TWITME_PATH.'/twitSubmitall.php';

$mQue            = twitme_openQue();
$sSubmitallStyle = ($mQue== FALSE) ? 'style="display: none"' : '';
$aPostsSubmitted = unserialize (TWITME_SUBMITTED);
$bHighlightMessageSend = false;

if (!is_array ($aPostsSubmitted)) $aPostsSubmitted = array();

if (isset ($_POST['cmd']))
{
	
	
	switch ($_POST['cmd'])
	{
		
		case 'submit_all':
				
			/*
			** Walk the que and submit the posts that have not been submitted yey 
			*/
			if (is_array ($mQue))
			{
				foreach ($mQue as $post_id)
				{
				  twitme_notify_twitter ($post_id, true);
				  $aPostsSubmitted [] = $post_id;
				}
				
				
				
				$mQue            = false;
				$sSubmitallStyle = 'style="display: none"';
			}
	     break;
		 
		 case 'submit_post':
		  	$oInstance = new twitclass();
			$oInstance ->login (TWITME_USER, TWITME_PASSWORD);
			$sMessage  =  $_POST['send_data'];
			
			$oInstance ->doPost ($sMessage);
			
			/* Now that the message is posted
			** Get a new list of posts to display on this page.
			*/
			$aLastPosts = $oInstance->getLastPosts() ;
			$sMessage   = '';
		 break;
		 
		 case 'followers_message':
		    if (isset ($_POST['followerID']) && $_POST['followerID'] > 0)
		    {
		 
				$oInstance = new twitclass();
				$oInstance ->login (TWITME_USER, TWITME_PASSWORD);
				$aFollowers = $oInstance->getFollowers();
				$sName      = '';
				
				if (!is_array ($aFollowers)) break;
				
				foreach ($aFollowers as $aPerson) {
				  if ($aPerson->id == $_POST['followerID']) { 
				   $sName = $aPerson->screen_name; 
				   break;
				  }
				}
				
				if (isset ($_POST['send_data']) && $_POST['send_data'])
				{
					$oInstance->sendDirectMessage ($_POST['followerID'],  $_POST['send_data']);
					$sMessage = sprintf (__('Your message has been send to %s',TWITME_TRANSLATION_DOMAIN), $sName);
					$bHighlightMessageSend = true;
				}
		    }	 
		 break;
		 
		 
		 case 'deletefollower':
		  	$oInstance = new twitclass();
			$oInstance ->login (TWITME_USER, TWITME_PASSWORD);

		    if (isset ($_POST['followerID']) && $_POST['followerID'] > 0)
		    {
				$oInstance->deleteFollower ( $_POST['followerID'] );
				$oInstance->allowFollower  ( $_POST['followerID'] );
				$aFollowers = $oInstance->getFollowers();
		    }
	   	 break;
	}
	   

}
$aPosts          = get_posts();
$aTwittedPosts   = array ();
$iNumPosted      = 0;
$iPosts          = count ($aPosts);

foreach ($aPosts as $aPost) if (in_array ($aPost->ID, $aPostsSubmitted)) $aTwittedPosts [] = $aPost;
if (is_array ($aTwittedPosts)) $iNumPosted = count ($aTwittedPosts);

/* This fixes an old compliated bug.
** Suppose there are a load of messages send to Twitter BUT the admin desides to delete all the messages from the db and
** start all over again. In that situation we want to reset the stored submitted items as well.
*/
if (sizeof ($aPosts) <= 0)
{
	update_option ('twitme_submitted', serialize(array()));
	
	$aPostsSubmitted = array();
	$iPosts     = 0;
	$iNumPosted = 0;
}
$iCnt = 0;


if ($iNumPosted == 0 && $iPosts > 0)
 $sSubmitallStyle =  'style="display: none"';
 
?>
<script src="<?php echo TWITME_PATH;?>/scripts/jquery.js" type="text/javascript"></script>
<script src="<?php echo TWITME_PATH;?>/scripts/ui/effects.core.js" type="text/javascript"></script>
<script src="<?php echo TWITME_PATH;?>/scripts/ui/effects.highlight.js" type="text/javascript"></script>
<script type="text/javascript" src="<?php echo TWITME_PATH;?>/scripts/ui/ui.core.js" ></script>
<script type="text/javascript" src="<?php echo TWITME_PATH;?>/scripts/ui/ui.draggable.js" ></script>
<script type="text/javascript" src="<?php echo TWITME_PATH;?>/scripts/ui/ui.resizable.js" ></script>
<script type="text/javascript" src="<?php echo TWITME_PATH;?>/scripts/ui/ui.dialog.js" ></script>
<script type="text/javascript" src="<?php echo TWITME_PATH;?>/scripts/twitAjax.js" ></script>

<link rel="stylesheet" type="text/css" href="<?php echo TWITME_PATH;?>/Twitme-style.css" />

<div class="wrap">
  <h2><?=__("Posts that TwitMe has submitted to Twitter", TWITME_TRANSLATION_DOMAIN)?></h2>
  <br /><?=__("On this page you will find the names of the posts that TwitMe has send over to Twitter.", TWITME_TRANSLATION_DOMAIN)?>
  <br /><br />
  <div id="twit_resultDiv">
  </div>
  <input type="hidden" id="twit_url" value="<?php echo TWITME_PATH;?>" />
  <form action="" method="post">
     <span id="twitme_submitall" <?=$sSubmitallStyle?>> <input type="submit" class="button" value="<?=__("Submit all",TWITME_TRANSLATION_DOMAIN)?>" /><input type="hidden" name="cmd" value="submit_all" />
    <?=sprintf (__("You have (%s) Post(s) that are not yet submitted to Twitter. You can press the <strong>submit all</strong> button to submit the stories that have not been posted to Twitter yet", TWITME_TRANSLATION_DOMAIN), count ($mQue));?><br /><br />
</span>
    
  </form>
 
 <br />
  
  <div id="result_content" style="background:#ffffff; width: 295px;"><?=$sMessage?></div>
  <br />
  <?php
   if ($iNumPosted == 0 && $iPosts == 0)
   {
	   
		echo '<table width="280" cellpadding="0" cellspacing="0" class="widefat"> 
			   <tr>
			     <td>'.__("No posts have been send and you have currently no posts to submit to Twitter", TWITME_TRANSLATION_DOMAIN).'</td>
			   </tr>
			   </table>';
	   
   } else if ($iNumPosted == 0 && $iPosts > 0)
   {
		echo '<table cellpadding="0" cellspacing="0" class="widefat" style="border: none">
			   <tr>
			     <td><span id="twitme_submitall_posts">'.__("No posts have been submitted YET. If you want to submit all available stories press the submit all button", TWITME_TRANSLATION_DOMAIN).'
				 <br />
				 <input type="button" id="twit_submitall" value="submit all" class="button" onclick="twitSubmitall()" />
				 <input type="hidden" id="twit_url" value="'.TWITME_PATH.'" />
				 <input type="hidden" id="twit_resultDiv" value="result_content" />
				 </span>
				 </td>
			   </tr>
			   </table>';
	   
   } else
   if ($iNumPosted > 0)
   {
		echo '<table cellpadding="0" cellspacing="0" class="widefat">
		       <thead>
				   <th scope="Col">'.__("Post ID", TWITME_TRANSLATION_DOMAIN).'</th>
				   <th scope="Col">'.__("Author", TWITME_TRANSLATION_DOMAIN).'</th>
				   <th scope="Col">'.__("Title", TWITME_TRANSLATION_DOMAIN).'</th>
				   <th scope="Col">'.__("Comments", TWITME_TRANSLATION_DOMAIN).'</th>
				   <th scope="Col">'.__("Date", TWITME_TRANSLATION_DOMAIN).'</th>
				   <th scope="Col">'.__("Action", TWITME_TRANSLATION_DOMAIN).'</th>
				   
			   </thead>
			   ';

		foreach ($aTwittedPosts as $key =>$val)
		{
			echo '<tr>
					<td>'.$val->ID.'</td>
					<td ><a href="'.get_author_posts_url($val->post_author).'">'.get_author_name($val->post_author).'</a></td>
					<td ><a href="'.$val->guid.'">'.$val->post_title.'</a></td>
					<td>'.$val->comment_count.'</td>
					<td>'.$val->post_date.'</td>
					<td>
					 <input type="button" class="button" value="'.__("Resend", TWITME_TRANSLATION_DOMAIN).'" onclick="twitResendPost('.$val->ID.')" />
					</td>

				</tr>';
			
		}
		echo '</table>';
   }
 
   ?>
	<br /><br /><br />
	  <table cellpadding="0" cellspacing="0" class="widefat" style="width: 475px; clear: none; float: right">
	   <thead>
	   <td scope="Col"><?=__("Send an update to twitter", TWITME_TRANSLATION_DOMAIN)?></td>
	   </thead>
	   <tr>
		<td>
         
		 <form action="" method="post" enctype="application/x-www-form-urlencoded">
		   <textarea name="send_data" id="send_data_update" rows="2" cols="40" style="width:100%" onkeydown="return checkRemaining(this)"></textarea>
           <span id="twitme_message_remaining"><?=__('140 chars remaining', TWITME_TRANSLATION_DOMAIN)?></span><br />
           <a href="http://www.twitter.com/<?=TWITME_USER?>" target="_blank"><?=__("Your Twitter page",TWITME_TRANSLATION_DOMAIN)?></a>
		   <input type="submit" value="<?=__("Send update",TWITME_TRANSLATION_DOMAIN)?>"  style="float: right"  class="button" />
           <input type="hidden" name="cmd" value="submit_post" />
		 </form>
		 <br />
		 <br />
		 <hr />
		 <div style="height: 287px; overflow: auto">
         <?
			
		 	if (sizeof ($aLastPosts) <= 0)
			 echo '<center><strong>'.__("No posts yet", TWITME_TRANSLATION_DOMAIN).'</strong></center>';
			
			if (sizeof ($aLastPosts) > 0)
			{
				foreach ($aLastPosts as $aPost)
				{
					$aUser = $aPost->user;
					?>
						<img src="<?=$aUser->profile_image_url;?>" align="texttop" style="float: left; padding-right: 5px;" />
					   <div align="justify" style="width: 300px;">
						 <?=$aPost->text?>
					   </div>
					   <div style="clear:both; padding-top: 5px"></div>
					   <hr />
					
					<?
				}
			}
		 ?>
         </div>
		</td>
	   </tr>
	   </table>
	<?
  
	echo '
	   <form method="post" actio="" name="frmFollowersList">
		<table cellpadding="0" cellspacing="0"  class="widefat" style="width: 464px; float: left; position: relative; clear: none">
		   <thead>
		   <td scope="Col">'.__('These are you followers', TWITME_TRANSLATION_DOMAIN).'</td>
		   </thead>
		   <tr>
		    <td>
			<div style="height: 400px; overflow: auto">
		   ';

	if (sizeof ($aFollowers) <= 0)
	{
	   echo '<center><strong>'.__('You have no followers yet', TWITME_TRANSLATION_DOMAIN).'</strong></center>';	
	} else
	foreach ($aFollowers as $aFollower)
 	{
		?>
           <table style="float: left;  position: relative;" width="81">
             <tr valign="top">
               <td style="padding: 0;"><img src="<?=$aFollower->profile_image_url;?>" /></td>
               <td style="vertical-align:top; border: none;">
                 <img src="<?php echo TWITME_PATH;?>/images/trash.png"  title="Delete Follower" onclick="deleteFollower(<?=$aFollower->id?>);" style="float:right; position: relative;cursor: pointer;"><br />
                 <img src="<?php echo TWITME_PATH;?>/images/sendmessage.gif" title="Send message" style="float:right; position: relative;cursor: pointer;"  height="16" width="16" onclick="showFollowerMessagesDialog('<?=$aFollower->id;?>');" align="top" />      
               </td>
             </tr>
             <tr>
               <td colspan="2" style="padding: 0; border: none;">
        		    <a target="_blank" href="http://twitter.com/<?=$aFollower->screen_name;?>"><?=$aFollower->screen_name;?></a>      
               </td>
             </tr>
           </table>
          
        
        <?
		if ($iCnt == TWITME_MAXFOLLOWERS_PER_ROW) 
		{
		  $iCnt = 0;
		  echo '<div style="clear: both;height: 30px;"></div>';
		} else
		$iCnt ++;
	}
	echo '</div>';
	echo '</td>';
    echo '</tr>';
	echo '</table>';
	echo '<input type="hidden" name="cmd" value="deletefollower" />';
	echo '<input type="hidden" id="follower_Id" name="followerID" />';
	echo '</form>';
  ?>
  <div style="clear: both"></div>
  <br /><br />
  <div id="message_followers" style="visibility:hidden; width: 490px;">
    <strong><?=__("Message:",TWITME_TRANSLATION_DOMAIN)?></strong>
    
		 <form action="" method="post" unsubmit="return false">
           <div style="width: 374px;">
		   <textarea name="send_data" rows="2" cols="43"  onkeydown="return checkRemainingFollowerMessage(this)"></textarea>
           <span id="twitme_followermessage_remaining" style="line-height: 30px;"><?=__('140 chars remaining', TWITME_TRANSLATION_DOMAIN)?></span><br />
		   <input type="submit" value="<?=__("Send Message",TWITME_TRANSLATION_DOMAIN)?>"class="button" style="float:right" />
           <input type="hidden" name="followerID" id="followerID" value="" />  
           <input type="hidden" name="cmd" value="followers_message"  />
           <small>
             <?=__("you can close this window by pressing the close icon or press escape on your keyboard.",TWITME_TRANSLATION_DOMAIN)?>
           </small>
           </div>
		 </form>

  </div>
</div>
<script type="text/javascript">
   function checkRemaining(obj)
   {
   	  var counterBlock = document.getElementById( 'twitme_message_remaining' );
      
   	  if (!obj) return false;
     
      var iLenght = obj.value.length;
      
      counterBlock.innerHTML = (140 - iLenght) + ' chars remaining';
      
      if (iLenght >= 140)
       return false;
       
      return true;
   }
   
   function checkRemainingFollowerMessage (obj)
   {
   	  var counterBlock = document.getElementById( 'twitme_followermessage_remaining' );
      
   	  if (!obj) return false;
     
      var iLenght = obj.value.length;
      
      counterBlock.innerHTML = (140 - iLenght) + ' chars remaining';
      
      if (iLenght >= 140)
       return false;
       
      return true;   
   }
 
</script>