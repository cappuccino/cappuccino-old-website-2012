/*
** As from version 1.5.1 Twitme entirly changed from the prototype
** framework to the jquery framework. If you Find any javascript bugs 
** then this case could be why.
**
** Johnny Mast
*/




/*
** This function resends a Twitter that you 
** already have send before.
*/
function twitResendPost(iPostID)
{
	var aData = {
		'postid' : iPostID,
		'cmd'    : 'resend',
	}

	$.post ( $('#twit_url').attr ('value') + 'twitOptions.php', aData,
	  function(data)  {
		  $('#result_content').html ( data );
	  }  
	);

	/* Add a nice highlight effect to the save results */
	$("#result_content").effect("highlight", {}, 1200); 
	return false;		
}




/*
** Test the connection to Twitter.
*/
function twitCheckConnection()
{
	var aData = {
		'username'         : encodeURIComponent($('#twit_username').attr ('value')),
		'password'         : encodeURIComponent($('#twit_password').attr('value')),
	}

	if (aData.username && aData.password)
	{
	  $.get ( $('#twit_url').attr ('value') + 'twitOptions.php', aData,
	    function(data)  {
		  $('#result_content').html ( data );
	    }  
	  );
	} 
	
	/* Add a nice highlight effect to the save results */
	$("#result_content").effect("highlight", {}, 1200); 
	
	/* Jump to that message */
	document.location.href='#result_content';
	return false;	
}


/*
** This function sends all messages to Twitter that are not send yet.
*/
function twitSubmitall()
{
	var aData = { 'cmd': 'submit_all' };
	
	$('#twitme_submitall_posts').html ($('<img src="../wp-content/plugins/twitme/images/loading.gif" height="19" /><br /><span>  Sending please wait...</span>'));
	
	$.post ( $('#twit_url').attr ('value') + 'twitOptions.php', aData,
	    function(data)  {
		  $('#twit_resultDiv').html ( data );
		  $('#twitme_submitall_posts').fadeOut ('slow');
		  
		  
		  document.location.href = document.location.href;
	    }  
	);
	
	
			
	/* Add a nice highlight effect to the save results */
	$("#twit_resultDiv").effect("highlight", {}, 1200); 
		
	return false;	
}



/* Save the settings and display the "settings saved" message.
*/
function twitSaveSettings()
{
	/*
	** Send over this data back to the dashboard.
	*/
	var aData = {
		'username'         : encodeURIComponent($('#twit_username').attr ('value')),
		'password'         : encodeURIComponent($('#twit_password').attr('value')),
		'message'          : encodeURIComponent($('#postmessage').attr ('value')),
		'notifyfollowers'  : $('#notify_followers_0').attr('checked') ? 'on' : 'off',
		'followersmessage' : encodeURIComponent($('#followers_message').attr('value')),
		'autopost'         : $('#twitme_autosend_0').attr('checked') ? 'on' : 'off',
		'shorturls'        : $('#twitme_shorturls_0').attr('checked') ? 'on' : 'off',
		'cmd'              : $('#twit_cmd').attr('value'),
		'method'           : $('#useMethod_0').attr('checked') ? 'template' : 'summary'
	}
	
	if (aData.username && aData.password)
	{
		
	  $.post ( $('#twit_url').attr ('value') + 'twitOptions.php', aData,
	    function(data)  {
		  $('#result_content').html ( data );
	    }  
	  );
	} 

	/* Add a nice highlight effect to the save results */
	$("#result_content").effect("highlight", {}, 1200); 
	
	/* Jump to that message */
	document.location.href='#result_content';
	return false;
}







function deleteFollower (followerID)
{
	if (confirm ('Are you sure you want to delete this Follower ?'))
	{
		document.getElementById('follower_Id').value = followerID;
		document.frmFollowersList.submit();
	}
}
   
    
   
function showFollowerMessagesDialog (sFollowerID)
{
	$('#message_followers').dialog(		
	{
		modal:true, 
		height: 200,
		width:  400,
		title: 'Contact your followers', 
		overlay: { opacity: 0.5,  background: "black" }
	}).css ('visibility', 'visible');
	
	$('#followerID').attr ('value', sFollowerID);	
}

function encodeUpdateMessage () {
 var sValue =  encodeURIComponent ($('#send_data_update').attr ('value'));
  $('#send_data_update	').attr ('value',sValue);
  return true;
}