<?php

//header.php
$root = "/";

$navigationLinks = array();

$navigationLinks["Home"] = array( "title" => "Home", "url" => $root );
$navigationLinks["Learn"] = array( "title" => "Learn", "url" => $root."learn/" );
$navigationLinks["Discuss"] = array( "title" => "Discuss", "url" => $root."discuss/" );
$navigationLinks["Contribute"] = array( "title" => "Contribute", "url" => $root."contribute/" );
$navigationLinks["Download"] = array( "title" => "Download", "url" => $root."download/" );    

echo "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n".
     "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.1//EN\" \"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd\">";
     
?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>

    <meta name="copyright" content="Copyright 2009 - 280 North, Inc.">
    <meta name="description" content="Cappuccino is an open source framework that makes it easy to build desktop-caliber applications that run in a web browser.">

    <link rel="stylesheet" type="text/css" media="screen" href="<?php echo $root; ?>includes/style.css"/>
	  <link rel="shortcut icon" href="/images/favicon.png" type="image/png" />
	
    <!--[if IE]>
    <link rel="stylesheet" type="text/css" media="screen" href="<?php echo $root; ?>includes/style-ie.css"/>
    <![endif]-->
    
    <title>Cappuccino Web Framework<?php if(isset($title)) echo " - ".$title; ?></title>

</head>
<body>

    <div id="headerWrapper">
        <div id="headerContent">
            <div id="navigation">
            
                <?php 
                foreach($navigationLinks as $link)
                {
                    if(isset($active) && $link["title"] == $active)
                    {
                    ?>    
                        <div class="navigationLink">
                            <a class="activeLink" href="<?php echo $link["url"] ?>">
                            <?php echo $link["title"] ?></a>
                            <div id="navigationMarker"></div>
                        </div>
                    <?php
                    }
                    else
                    {
                    ?>    
                        <div class="navigationLink">
                            <a href="<?php echo $link["url"] ?>"><?php echo $link["title"] ?></a>
                        </div>
                    <?php
                    }
                }
                ?>
                
            </div>
            <div id="cappuccinoAnchor">
                <a href="/"><img width="32" height="32" id="cappuccinoAnchorLogo" src="<?php echo $root; ?>images/cappuccino-small.png" alt=" " /></a>
                <a href="/">cappuccino.org</a>
            </div>
        </div>
    </div>
