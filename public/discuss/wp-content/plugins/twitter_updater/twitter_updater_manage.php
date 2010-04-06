<?php 
	//update_option('twitterInitialised', '0');
	//SETS DEFAULT OPTIONS
	if(get_option('twitterInitialised') != '1'){
		update_option('newpost-created-update', '1');
		update_option('newpost-created-text', 'Writing a new blog post!');
		
		update_option('newpost-edited-update', '1');
		update_option('newpost-edited-text', 'Still writing the new blog post..');

		update_option('newpost-published-update', '1');
		update_option('newpost-published-text', 'Published a new post: #title#');
		update_option('newpost-published-showlink', '1');

		update_option('oldpost-edited-update', '1');
		update_option('oldpost-edited-text', 'Fiddling with my blog post: #title#');
		update_option('oldpost-edited-showlink', '1');

		update_option('twitterInitialised', '1');
	}
	

	if($_POST['submit-type'] == 'options'){
		//UPDATE OPTIONS
		update_option('newpost-created-update', $_POST['newpost-created-update']);
		update_option('newpost-created-text', $_POST['newpost-created-text']);
		
		update_option('newpost-edited-update', $_POST['newpost-edited-update']);
		update_option('newpost-edited-text', $_POST['newpost-edited-text']);

		update_option('newpost-published-update', $_POST['newpost-published-update']);
		update_option('newpost-published-text', $_POST['newpost-published-text']);
		update_option('newpost-published-showlink', $_POST['newpost-published-showlink']);

		update_option('oldpost-edited-update', $_POST['oldpost-edited-update']);
		update_option('oldpost-edited-text', $_POST['oldpost-edited-text']);
		update_option('oldpost-edited-showlink', $_POST['oldpost-edited-showlink']);

	}else if ($_POST['submit-type'] == 'login'){
		//UPDATE LOGIN
		if(($_POST['twitterlogin'] != '') AND ($_POST['twitterpw'] != '')){
			update_option('twitterlogin', $_POST['twitterlogin']);
			update_option('twitterlogin_encrypted', base64_encode($_POST['twitterlogin'].':'.$_POST['twitterpw']));

		}else{
			echo("<div style='border:1px solid red; padding:20px; margin:20px; color:red;'>You need to provide your twitter login and password!</div>");
		}
	}

	// FUNCTION to see if checkboxes should be checked
	function vc_checkCheckbox($theFieldname){
		if( get_option($theFieldname) == '1'){
			echo('checked="true"');
		}
	}
?>
<style type="text/css">
	fieldset{margin:20px 0; 
	border:1px solid #cecece;
	padding:15px;
	}
</style>
<div class="wrap">
	<h2>Your Twitter update options</h2>

	<form method="post">
	<div>
		<fieldset>
			<legend>New post created</legend>
			<p>
				<input type="checkbox" name="newpost-created-update" id="newpost-created-update" value="1" <?php vc_checkCheckbox('newpost-created-update')?> />
				<label for="newpost-created-update">Update Twitter when a new post is created (saved but not published)</label>
			</p>
			<p>
				<label for="newpost-created-text">Text for this Twitter update ( use #title# as placeholder for page title )</label><br />
				<input type="text" name="newpost-created-text" id="newpost-created-text" size="60" maxlength="146" value="<?php echo(get_option('newpost-created-text')) ?>" />
			</p>
		</fieldset>

		<fieldset>
			<legend>New post edited</legend>
			<p>
				<input type="checkbox" name="newpost-edited-update" id="newpost-edited-update" value="1" <?php vc_checkCheckbox('newpost-edited-update')?> />
				<label for="newpost-edited-update">Update Twitter when the new post is edited (re-saved but not published)</label>
			</p>
			<p>
				<label for="newpost-edited-text">Text for this Twitter update ( use #title# as placeholder for page title )</label><br />
				<input type="text" name="newpost-edited-text" id="newpost-edited-text" size="60" maxlength="146" value="<?php echo(get_option('newpost-edited-text')) ?>" />
			</p>
		</fieldset>
		
		<fieldset>
			<legend>New post published</legend>
			<p>
				<input type="checkbox" name="newpost-published-update" id="newpost-published-update" value="1" <?php vc_checkCheckbox('newpost-published-update')?> />
				<label for="newpost-published-update">Update Twitter when the new post is published</label>
			</p>
			<p>
				<label for="newpost-published-text">Text for this Twitter update ( use #title# as placeholder for page title )</label><br />
				<input type="text" name="newpost-published-text" id="newpost-published-text" size="60" maxlength="146" value="<?php echo(get_option('newpost-published-text')) ?>" />
				&nbsp;&nbsp;
				<input type="checkbox" name="newpost-published-showlink" id="newpost-published-showlink" value="1" <?php vc_checkCheckbox('newpost-published-showlink')?> />
				<label for="newpost-published-showlink">Link title to blog?</label>
			</p>
		</fieldset>
		
		<fieldset>
			<legend>Existing posts</legend>
			<p>
				<input type="checkbox" name="oldpost-edited-update" id="oldpost-edited-update" value="1" <?php vc_checkCheckbox('oldpost-edited-update')?> />
				<label for="oldpost-edited-update">Update Twitter when the an old post has been edited</label>
			</p>
			<p>
				<label for="oldpost-edited-text">Text for this Twitter update ( use #title# as placeholder for page title )</label><br />
				<input type="text" name="oldpost-edited-text" id="oldpost-edited-text" size="60" maxlength="146" value="<?php echo(get_option('oldpost-edited-text')) ?>" />
				&nbsp;&nbsp;
				<input type="checkbox" name="oldpost-edited-showlink" id="oldpost-edited-showlink" value="1" <?php vc_checkCheckbox('oldpost-edited-showlink')?> />
				<label for="oldpost-edited-showlink">Link title to blog?</label>
			</p>
		</fieldset>

		<input type="hidden" name="submit-type" value="options">
		<input type="submit" name="submit" value="save options" />
	</div>
	</form>
</div>

<div class="wrap">
	<h2>Your Twitter account details</h2>
	
	<form method="post" >
	<div>
		<p>
		<label for="twitterlogin">Your email address registered at Twitter:</label>
		<input type="text" name="twitterlogin" id="twitterlogin" value="<?php echo(get_option('twitterlogin')) ?>" />
		</p>
		<p>
		<label for="twitterpw">Your Twitter password:</label>
		<input type="password" name="twitterpw" id="twitterpw" value="" />
		</p>
		<input type="hidden" name="submit-type" value="login">
		<p><input type="submit" name="submit" value="save login" />
		&nbsp; ( <strong>Don't have a Twitter account? <a href="http://www.twitter.com">Get one for free here</a></strong> )</p>
	</div>
	</form>
	
</div>

<div class="wrap">
	<h2>Need help?</h2>
	<p>Visit the <a href="http://blog.victoriac.net/?p=87">plugin page</a>.</p>
</div>