<?php

$active = "Learn";
$title = "Demos"; 
include('../../includes/header.php');

?>

    <div id="topContentWrapper"></div>
    
    <div id="mainContentWrapper">
        <div id="mainContent">

            <div id="subNavigation">
            <?php 
                $subActive = "Demos";
                include('../learn_links.php');
            ?>
            </div>
            
            <div id="mainContentDetail">

<h1>Products Using Cappuccino</h1>
            
<h2><a href="http://280slides.com">280 Slides</a></h2>
<p>The first major Cappuccino application, 280 Slides is one of the most advanced applications on the web today.  It makes heavy use of some of the most advanced features of Cappuccino, including the built-in document architecture, object copy and paste, undo and redo, and smooth interactive graphics.</p>

<h1>Cappuccino Demos</h1>

<h2><a href="LightsOff/">Lights Off</a></h2>
<p>This is the same Lights Off that was ported to iPhone, now ported to Cappuccino! <a href="LightsOff.zip">Download the source</a>.</p>


<h2><a href="FlickrPhotoDemo/">Flickr Photo Demo</a></h2>
<p>Browser a collection of photos pulled straight from Flickr. <a href="FlickrPhotoDemo.zip">Download the source</a>.</p>

<h2><a href="FloorPlan/">FloorPlan</a></h2>
<p>A drag and drop floor plan editor, from the tutorial found on <a href = "http://www.thinkvitamin.com/features/ajax/add-undo-and-redo-to-your-web-application-with-cappuccino">ThinkVitamin</a>. <a href="FloorPlan.zip">Download the source</a>.</p>

<h2><a href="puzzle/">Puzzle</a></h2>
<p>The classic puzzle tile game, built for the iPhone. <a href="Puzzle.zip">Download the source</a>.</p>

<h2><a href="http://joris.kluivers.nl/Bingo/">SteveNote Bingo</a></h2>
<p>An iPhone optimized bingo application for Steve Jobs keynotes.</p>

<br />
<p>If you've got a demo, or a web app powered by Cappuccino, send us an e-mail at 
<a href="mailto:developers@280north.com">developers@280north.com</a></p>

            </div>
            
            <div style="clear: both;"></div>
        </div>
    </div>

<?php 

include('../../includes/footer.php');

?>