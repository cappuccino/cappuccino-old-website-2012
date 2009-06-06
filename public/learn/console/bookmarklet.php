<html>
<head>
	<title>Bookmarklet Utility</title>
</head>
<body>

<?php
	//perl -0777 -e 'use MIME::Base64; $text = <>; $text = encode_base64($text); $text =~ s/\s+//g; print "data:text/html;charset=utf-8;base64,$text\n";'
	//openssl enc -base64 -in console.html -out console.base64

	$console_data = base64_encode(file_get_contents("console.html"));
	$url_header = "data:text/html;charset=utf-8;base64,";
	
	$url =	"javascript:".
		"(function() {
			data='$console_data';
			dataurl='$url_header'+data;
			window_name = confirm('Open in new window? (\'OK\' for new, \'Cancel\' for existing)')?'_blank':'_self';
			new_window = window.open('',window_name,'height=600,width=400,menubar=no,location=no,toolbar=no,status=yes,resizable=yes,scrollbars=yes');
			new_window.document.write(atob(data));
			setTimeout(function() { new_window.focus(); }, 0);
		})();";
					
	echo "<a href=\"$url\">Bookmarklet</a>";
?>

</body>
</html>
