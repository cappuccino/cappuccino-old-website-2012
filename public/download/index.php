<?php

$active = "Download";
$title = "Download";
include('../includes/header.php');

?>

    <div id="topContentWrapper">
        <div id="topContent">
            <div id="topLeftDownloadContent">
                <a href="/starter"><img id="downloadImage" width="300" height="300" src="../images/PackageIcon.png" alt="Starter Package"/></a>
            </div>
            <div id="topRightDownloadContent">
                    <h1>Download Cappuccino</h1>
                    <h3>Latest Version: 0.9.5 (November 16, 2011)</h3>
                <div>
                    <h2><a href="/starter">Starter Package</a></h2>
                    <p>Get started fast with Cappuccino and a new project template.</p>
                </div>
                <div style="font-size:90%;">
                    <h2 style="font-size:150%;">Frameworks &amp; Tools</h2>
                    <p>Beyond the starter pack, Cappuccino comes with a number of tools to make it easy to create new applications. With or without the starter pack, you can install all of Cappuccino and accompanying tools with the following command:</p>
                </div>
            </div>
            <div style="clear:both;"></div>
            <code style="padding-top:4px; padding-bottom:4px; font-size: 12px;"><pre>curl https://raw.github.com/cappuccino/cappuccino/v0.9.5/bootstrap.sh >/tmp/cb.sh &amp;&amp; sh /tmp/cb.sh</pre></code>
        </div>
    </div>

    <div id="mainContentWrapper">
        <div id="mainContent">

<h1>Now What?</h1>
<p>Your download includes a README file with a few quick tips on how to get started. We have a more elaborate <a href="/download/readme.php">README available online</a>.
<p>You'll also probably want to check out our <a href="/learn/tutorials/">tutorials</a> section.  <a href="/learn/tutorials/starter-tutorial.php">This one</a> is designed specifically for figuring out what to do the very first time you download Cappuccino.</p>

<p><b>If you use Google Chrome, please note</b> that recent changes in the security policies mean you'll have to use Cappuccino through a webserver rather than directly from the filesystem. You can read more <a href="http://cappuccino.org/learn/tutorials/getting-setup.php#chrome">here</a>.</p>
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
    <li><a href="http://download.cappuccino.org/CappuccinoStarter-0.9.zip">Cappuccino Starter 0.9</a> (February 22, 2011)</li>
    <li><a href = "http://download.cappuccino.org/CappuccinoStarter-0.8.1.zip">Cappuccino Starter 0.8.1</a> (April 9th, 2010)</li>
    <li><a href = "http://download.cappuccino.org/CappuccinoStarter-0.8.zip">Cappuccino Starter 0.8</a> (April 6th, 2010)</li>
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