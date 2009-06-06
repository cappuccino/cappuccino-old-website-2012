<?php

$active = "Learn";
$title = "Tutorials"; 
include('../../includes/header.php');

?>

    <div id="topContentWrapper"></div>
    
    <div id="mainContentWrapper">
        <div id="mainContent">

            <div id="subNavigation">
            <?php 
                $subActive = "Tutorials";
                include('../learn_links.php');
            ?>
            </div>
            
            <div id="mainContentDetail">
            
                <h1>Tutorials</h1>
            
                <p>We've assembled a list of tutorials about Cappuccino, Objective-J, and related topics below.  Right now this list is short, but it will continue to grow as time goes on.  If you're interested in writing a tutorial, or already have, send us an email at <a href="mailto:developers@280north.com">developers@280north.com</a>.</p>
                
                <h2><a href="getting-setup.php">Getting Set Up for Web Development with Cappuccino</a></h2>
                <p>Tips for setting up your environment for web development. This is basic information intended for people who haven't done a great deal of development in the browser, but everyone may find some useful tips.</p>
                
                <h2><a href="objective-j-tutorial.php">Learning Objective-J</a></h2>
                <p>A great introduction to Objective-J.  Familiarity with JavaScript is recommended, prior knowledge of Objective-C not required.</p>
                
                <h2><a href="starter-tutorial.php">Downloading & Running the Sample Application</a></h2>
                <p>Get the <a href="/starter">Cappuccino Starter</a> download, and then follow this simpe tutorial for running the sample application, and making a few simple changes.</p>

                <h2>Graphics</h2>
                <p>Graphics are an important component of just about any UI application, the following tutorials cover different aspects of Cappuccino UI programming:</p>
                
                <ul>
                    <li>
                        <h3><a href= "automatic-layout">Automatic Layout Support</a></h3>
                        <p>This tutorial covers Cappuccino's powerful system of automatic resizing and repositioning support for creating dynamic layouts easily and quickly.</p>
                    </li>
                </ul>
                    

                <h2>Scrapbook</h2>
                <p>The Scrapbook series of tutorials is designed to walk you through the creation of an entire real world application.  It's broken up into several pieces and each focuses on a different set of features in Cappuccino.</p>
                
                <ul>
                    <li>
                        <h3><a href = "scrapbook-tutorial-1">Part I - An introduction to Cappuccino Graphics</a></h3>
                        <p>In this first installment we'll be prototyping out the application and learning a bit about how graphics are handled in Cappuccino.</p>
                    </li>

                    <li>
                        <h3><a href = "scrapbook-tutorial-2">Part II - Adding Drag and Drop</a></h3>
                        <p>In the second installment of this series we will be learning how to add drag and drop to our application.  In the process we'll also be touching on 
                        the topics of scroll views and collection views.</p>
                    </li>
                </ul>

                <h2>Additional Tutorials</h2>
                <ul>
                    <li><h3><a href="http://thinkvitamin.com/dev/add-undo-and-redo-to-your-web-application-with-cappuccino/">Add Undo and Redo to Your Web Application With Cappuccino</a></h3>
                    <p>thinkvitamin.com tutorial on adding undo and redo to an application</p></li>
                    <li><h3><a href="http://www.nice-panorama.com/Programmation/cappuccino/">nice-panorama.com Cappuccino Tutorials</a></h3>
                    <p>Several Cappuccino and Objective-J tutorials, covering basics of AppKit, Foundation, Objective-J, data serialization, and other topics.</p></li>
                    
                    <li><h3><a href="http://www.postpeakliving.com/content/debugging-cappuccino-using-safari">Debugging Cappuccino Using Safari</a></h3>
                    <p>Overview of the debugging features of WebKit/Safari, and how to use them with Cappuccino and Objective-J, by Andre Angelantoni.</p></li>
                    
                    <li><h3><a href="http://cappuccinocasts.com/">Cappuccino Casts</a></h3><p>Video screen casts of going through Cappuccino &amp; Objective-J tutorials, hosted by Thomas Balthazar.</p></li>
                </ul>
            </div>
            
            <div style="clear: both;"></div>
        </div>
    </div>

<?php 

include('../../includes/footer.php');

?>