<?php

$active = "Download";
$title = "Download";
include('../includes/header.php');

?>

    <div id="topContentWrapper">
        <div id="topContent">
            <div id="topLeftDownloadContent">
                <a href="/starter"><img id="downloadImage" width="300" height="300" src="../images/arrow.png" alt="Starter Package"/></a>
            </div>
            <div id="topRightDownloadContent">
                    <h1>Download Cappuccino</h1>
                    <h3>Latest Version: 0.8 (April 6th, 2010)</h3>
                <div>
                    <h2><a href="/starter">Starter Package</a></h2>
                    <p>Get started fast with Cappuccino and a new project template.</p>
                </div>
                <div style="font-size:90%;">
                    <h2 style="font-size:150%;">Frameworks &amp; Tools</h2>
                    <p>If you already have <strong>tusk</strong> installed:</p>
                    <code style="padding-top:4px; padding-bottom:4px;">tusk install --force cappuccino</code>
                    <p>Otherwise, there's a script included in the Starter package called <strong>bootstrap.sh</strong> which will download everything you need:</p>
                    <code style="padding-top:4px; padding-bottom:4px;">Starter/bootstrap.sh</code>
                </div>
            </div>
            <div style="clear:both;"></div>
        </div>
    </div>

    <div id="mainContentWrapper">
        <div id="mainContent">

<h3>Now What?</h3>
<p>You'll probably want to check out our <a href="/learn/tutorials/">tutorials</a> section.  <a href="/learn/tutorials/starter-tutorial.php">This one</a> is designed specifically for figuring out what to do the very first time you download Cappuccino.</p>

<h3>Getting the Source</h3>
<p>If you'd like the full source, you can check it out on our Github <a href="http://github.com/cappuccino/cappuccino/">repository</a>, or clone it with this command:</p>
<code>
git clone git://github.com/cappuccino/cappuccino.git
</code>
<p>Learn more about <a href="/contribute">contributing</a>.</p>

<h3>Nightly Builds</h3>
<p>Every day we push pre-built copies of the framework to github. Read more about it on our <a href="http://cappuccino.org/nightly/">nightly builds</a> page.</p>

<h3>Archived Versions</h3>
<p>Looking for older versions of Cappuccino? You can find some of our latest releases below.</p>
<ul>
    <li><a href = "http://download.cappuccino.org/CappuccinoStarter-0.7.1.zip">Cappuccino Starter 0.7.1</a> and <a href = "http://download.cappuccino.org/CappuccinoTools-0.7.1.zip">Cappuccino Tools 0.7.1</a> (July 6th, 2009)</li>
    <li><a href = "http://download.cappuccino.org/CappuccinoStarter-0.7.zip">Cappuccino Starter 0.7</a> and <a href = "http://download.cappuccino.org/CappuccinoTools-0.7.zip">Cappuccino Tools 0.7</a> (May 20th, 2009)</li>
    <li><a href = "http://download.cappuccino.org/CappuccinoStarter-0.6.zip">Cappuccino Starter 0.6</a> and <a href = "http://download.cappuccino.org/CappuccinoTools-0.6.zip">Cappuccino Tools 0.6</a> (December 10th, 2008)</li>
    <li><a href = "http://download.cappuccino.org/CappuccinoStarter-0.5.5.zip">Cappuccino Starter 0.5.5</a> and <a href = "http://download.cappuccino.org/CappuccinoTools-0.5.5.zip">Cappuccino Tools 0.5.5</a> (October 8th, 2008)</li>
    <li><a href = "http://download.cappuccino.org/CappuccinoStarter-0.5.1.zip">Cappuccino Starter 0.5.1</a> and <a href = "http://download.cappuccino.org/CappuccinoTools-0.5.1.zip">Cappuccino Tools 0.5.1</a> (September 13th, 2008)</li>
    <li><a href = "http://download.cappuccino.org/CappuccinoStarter-0.5.zip">Cappuccino Starter 0.5</a> and <a href = "http://download.cappuccino.org/CappuccinoTools-0.5.zip">Cappuccino Tools 0.5</a> (September 4th, 2008)</li>
</ul>

<h3>Contributors</h3>
<p>Visit the <a href="http://contributors.cappuccino.org/">contributors page</a> for a list of contributors to Cappuccino. For a list of Cappuccino forks on Github, check out the <a href="http://github.com/cappuccino/cappuccino/network">network</a> page.</p>

        </div>
    </div>

<?php

include('../includes/footer.php');

?>