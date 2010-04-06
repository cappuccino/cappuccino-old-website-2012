<?php

$active = "Download";
$title = "Download"; 
include('../includes/header.php');

?>

    <div id="topContentWrapper">
<!--
        <div id="topContent">
            <div style="clear:both;"></div>
        </div>    
-->
    </div>
    
    <div id="mainContentWrapper">
        <div id="mainContent">
        
<h1>Nightly Builds</h1>

<p style="font-size: 130%;">The easiest way to install a nightly build is with tusk, the package manager we use.
If you already have tusk installed (if you ran the bootstrap.sh script, for example), just run this command:</p>
<code style="font-size: 130%; padding-top: 1em;">tusk install --force http://cappuccino.org/nightly/objective-j http://cappuccino.org/nightly/cappuccino</code>

<p style="font-size: 130%;">To browse older nightlies, you can browse the commit history of the <a href="http://github.com/280north/cappuccino-package/tree/nightly">Cappuccino</a> and <a href="http://github.com/280north/objective-j-package/tree/nightly">Objective-J</a> nightly repositories.
Grab the frameworks from the nightly package out of the Frameworks directory, and place 
them in your project folder.
</p>

        </div>
    </div>

<?php 

include('../includes/footer.php');

?>