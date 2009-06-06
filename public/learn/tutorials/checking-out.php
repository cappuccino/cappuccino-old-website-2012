<?php

$active = "Learn";
$title = "Checking out the Cappuccino Source Code"; 

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
            
                <h1>Checking out the Cappuccino Source Code</h1>
            
<p>Once you've completed the <a href="/learn/tutorials/">other tutorials</a> and are familiar with the basics of creating Cappuccino applications, you may want to dig deeper into the source code for Cappuccino. The code is managed using the <a href="http://git-scm.com/">Git</a> version control system, and hosted on <a href="http://github.com/280north/cappuccino">GitHub</a>.</p>

<h3>Prerequisites</h3>

<p>There a few requirements before you can begin building Cappuccino from source:</p>

<ul>
    <li><a href="http://git-scm.com/">Git</a></li>
    <li><a href="http://rake.rubyforge.org/">Rake</a></li>
    <li><a href="http://gcc.gnu.org/">gcc</a></li>
    <li><a href="http://www.cygwin.com/">Cygwin</a> (only on Windows)</li>
</ul>

<h3>Checking Out From Git</h3>

<p>To obtain the latest source, simply clone the Cappuccino repository from GitHub to a directory of your choice:</p>

<code class="action">
git clone git://github.com/280north/cappuccino.git ~/Cappuccino
</code>

<h3>Building Cappuccino</h3>

<p>This repository contains the Objective-J language, the Cappuccino frameworks (Foundation and AppKit), Tools, and sample projects. To build a release of Cappuccino, simply run "ant" from the root of the checkout:</p>

<code class="action">
cd ~/Cappuccino
ant
</code>

<p>If all goes well, Cappuccino and Objective-J will be built and placed in the directory pointed to by $STEAM_BUILD/Release.</p>

<p>You can also build frameworks using the steam tool directly:</p>

<code class="action">
cd ~/Cappuccino/Foundation
steam
cd ../AppKit
steam
</code>

<p>Note that the "ant" task in the root Cappuccino directory does not currently work under Cygwin. Instead, you can run "ant" from the Objective-J directory, and "steam" from the Foundation and AppKit directories.</p>

<p>We're still working out these and other inevitable kinks, so if you're having problems don't be afraid to <a href="http://cappuccino.org/discuss/list.php">ask for help</a>!</p>
            </div>
            
            <div style="clear: both;"></div>
        </div>
    </div>

<?php 

include('../../includes/footer.php');

?>