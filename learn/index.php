<?php

$active = "Learn";
$title = "Learn About Cappuccino and Objective-J"; 
include('../includes/header.php');

?>

    <div id="topContentWrapper"></div>
    
    <div id="mainContentWrapper">
        <div id="mainContent">

            <div id="subNavigation">
            <?php 
                $subActive = "About Cappuccino";
                include('learn_links.php');
            ?>
            </div>
            
            <div id="mainContentDetail">
            
<h2>Learn More About Cappuccino &amp; Objective-J</h2>

<p>Cappuccino is an open source application framework for developing applications that look and feel like the desktop software users are familiar with.</p>

<p>Cappuccino is built on top of standard web technologies like JavaScript, and it implements most of the familiar APIs from GNUstep and Apple's Cocoa frameworks.  When you program in Cappuccino, you don't need to concern yourself with the complexities of traditional web technologies like HTML, CSS, or even the DOM. The unpleasantries of building complex cross browser applications are abstracted away for you.</p>

<p>Cappuccino was implemented using a new programming language called Objective-J, which is modelled after Objective-C and built entirely on top of JavaScript.  Programs written in Objective-J are interpreted in the client, so no compilation or plugins are required.  Objective-J is released alongside Cappuccino in this project and under the <a href="/learn/lgpl.txt">LGPL</a>.</p>

<h2>Designed for Applications</h2>

<p>Nobody will deny that there is a distinct difference between a web site and a desktop application.  Similarly, we believe there is a big difference between a static web page and a full fledged web application.  Cappuccino is designed for applications, not web pages.</p>

<p>Instead of doing all or most of the work on the server, Cappuccino applications do as much as possible in the client.  A typical application would never reload, but rather send and recieve data using traditional AJAX techniques and then present that data in the client code.  <a href="http://280slides.com">280 Slides</a> is the first Cappuccino application, and it's a showcase of what is possible with this new framework.</p>

<p>Instead of worrying about how to implement drag and drop, copy and paste (of text <em>and objects</em>), undo and redo, document saving, rich cross-browser drawing and graphics, and a slew of other features, developers are free to focus on specific problems like PowerPoint support, or Twitter integration, or whatever else makes their application unique and compelling.</p>

<h2>How does Cappucino Compare to Other Frameworks?</h2>
 
<p>Cappuccino is <em>not</em> designed for building web sites, or making existing sites more "dynamic".  We think these goals are too far removed from those of application development to be served well by a single framework.  Projects like Prototype and jQuery are excellent at those tasks, but they are forced by their nature to make compromises which render them ineffective at application development.</p>

<p>On the other end of the existing frameworks are technologies like SproutCore.  While SproutCore set out with similar goals to Cappuccino, it takes a distincly different approach.  It still relies on HTML, CSS, JavaScript, Prototype, and an entirely new and unique set of APIs.  It also requires special development software and a cumbersome compilation step.  We think this is the wrong approach.</p>

<p>With Cappuccino, you don't need to know HTML.  You'll never write a line of CSS.  You don't ever have interact with DOM.  We only ask developers to learn one technology, Objective-J, and one set of APIs.  Plus, these technologies are implementations of well known and well understood existing ones.  Developers can leverage decades of collective experience to really accelerate the pace of building rich web applications.</p>

<p>If you want to build a rich web application, you need to learn <em>something</em> new.  Many people think this will be JavaScript 2, or HTML 5, or some new standard.  The problem is, as we've come to realize, standards bodies work too slowly.  Cappuccino works right now, not in the theoretical future.  Objective-J is essentially JavaScript 2, but available today in every major browser.  Because we rely on only the most essential web technologies, improvements are not limited by the pace of browser vendors and standards bodies.</p>
                         
 <?php

/*        

<h2>Chart Form</h2>

<a href="comparison_chart_full.png"><img src="comparison_chart_small.png" width="600" alt="comparison chart" /></a>

<div class="footnotes">
<h3>Explanation</h3>
<p><strong>UI Component</strong>: Is there a built in UI component?  JQuery has one, but its a plugin.</p>
<p><strong>Number of Technologies</strong>: How many technologies do you need to know?  Most of these require HTML, CSS, and JavaScript.  Sproutcore requires Ruby/RHTML.</p>
<p><strong>Number of APIs</strong>: How many different APIs are used?  The DOM plus a new custom API in almost every case.</p>
<p><strong>Cross Browser</strong>: Does it work everywhere?  Internet Explorer, Firefox, Safari and Opera are all requirements for this test.</p>
<p><strong>Event Coalescing</strong>: In other words, how many event handlers are around at a given time?  Coalescing all events into a single handler is one of the largest potential speed gains missing in many frameworks.  Not to mention, Cappuccino's custom event system makes some things possible that aren't possible at all in the DOM.</p>
<p><strong>Dynamic Runtime</strong>: Objective-J uses message passing in conjunction with a dynamic runtime, meaning any message can be intercepted and even redirected somewhere else completely.</p>
<p><strong>Rich Graphics</strong>: Does the framework build in a way to do complex rich graphics without being limited to a specific technology?</p>
<p><strong>Undo</strong>: This one's pretty obvious - does it build in the ability to undo arbitrary actions?</p>
<p><strong>Document Based Apps</strong>: Built in support for managing documents within an application.</p>
</div>

*/

?>

<h2>Browsers</h2>

<p>Cappuccino and Objective-J run in any modern web browser, including:

<ul>
    <li>Internet Explorer 6 & 7</li>
    <li>Firefox 2 and 3</li>
    <li>Safari 3 / WebKit</li>
    <li>Google Chrome</li>
    <li>Opera 9</li>
</ul>

<h2>Thank You</h2>
<a name="thanks"></a>

<p>Obviously, like everyone else in the open source world, we owe a great deal of thanks to others, including several existing projects.  Among them are:</p>

<ul>
    <li><a href="http://www.gnustep.org/">GNU Step</a></li>
    <li><a href="http://www.cocotron.org/">Cocotron</a></li>
</ul>

<h2>More Information</h2>

<p>You can learn more about using Cappuccino and Objective-J in our <a href="/learn/tutorials/">tutorials</a>, or by browsing <a href="/learn/documentation/">documentation</a>.</p>

            </div>
            
            <div style="clear: both;"></div>
        </div>
    </div>

<?php 

include('../includes/footer.php');

?>
