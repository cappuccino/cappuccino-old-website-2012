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

    <link rel="stylesheet" type="text/css" media="screen" href="<?php echo $root; ?>includes/style.css"/>

    <!--[if IE]>
    <link rel="stylesheet" type="text/css" media="screen" href="<?php echo $root; ?>includes/style-ie.css"/>
    <![endif]-->

    <title><?php bloginfo('name'); ?> <?php if ( is_single() ) { ?> &raquo; Blog Archive <?php } ?> <?php wp_title(); ?></title>

    <link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	<link rel="shortcut icon" href="/images/favicon.png" type="image/png" />

    <?php wp_head(); ?>

</head>
<body>

    <div id="headerWrapper">
        <div id="headerContent">
            <div id="navigation">
            
                <?php 
                foreach($navigationLinks as $link)
                {
                    if($link["title"] == "Discuss")
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
    
    <div id="topContentWrapper"></div>
