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

<h2><a href="http://gomockingbird.com">Mockingbird</a></h2>
<p>An online tool that makes it easy for you to create, link together, preview, and share mockups of your website or application.</p>

<h2><a href="http://www.enstore.com/">Enstore</a></h2>
<p>Enstore is an e-commerce platform that works with <a href="http://www.checkoutapp.com/">Checkout</a> and AccountEdge.</p>

<h2><a href="http://timetableapp.com">TimeTable</a></h2>
<p>TimeTable will keep your time as you work, manage the work times, rates, and expenses for projects, keep track of clients, and when the time comes to invoice your client TimeTable will generate invoices for you too! </p>

<h2><a href="http://almost.at">Almost.at</a></h2>
<p>Track events in real time by aggregating data from around the web in one seemless app.</p>

<h1>Cappuccino Demos</h1>

<h2><a href="FlickrPhoto/index-deploy.html">Flickr Photo Demo</a></h2>
<p>Browser a collection of photos pulled straight from Flickr. <a href="FlickrPhoto.zip">Download the source</a>.</p>

<h2><a href="FloorPlan/index-deploy.html">FloorPlan</a></h2>
<p>A drag and drop floor plan editor, from the tutorial found on <a href = "http://www.thinkvitamin.com/features/ajax/add-undo-and-redo-to-your-web-application-with-cappuccino">ThinkVitamin</a>. <a href="FloorPlan.zip">Download the source</a>.</p>

<h2><a href="Scrapbook/Part%201/index-deploy.html">Scrapbook Part 1</a></h2>
<p>The first part of our <a href="/learn/tutorials/scrapbook-tutorial-1/">scrapbook tutorial</a>. <a href="Scrapbook/Scrapbook-Part-1.zip">Download the source</a>.</p>

<h2><a href="Scrapbook/Part%202/index-deploy.html">Scrapbook Part 2</a></h2>
<p>The first part of our <a href="/learn/tutorials/scrapbook-tutorial-2/">scrapbook tutorial</a>. <a href="Scrapbook/Scrapbook-Part-2.zip">Download the source</a>.</p>

<h2><a href="LightsOff/index-deploy.html">Lights Off</a></h2>
<p>This is the same Lights Off that was ported to iPhone, now ported to Cappuccino! <a href="Lights-Off.zip">Download the source</a>.</p>

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