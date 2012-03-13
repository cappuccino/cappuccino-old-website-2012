<?php

$active = "Contribute";
$title = "Contribute to Cappuccino";
include('../includes/header.php');

?>

    <div id="topContentWrapper"></div>

    <div id="mainContentWrapper">
        <div id="mainContent">

            <div id="subNavigation">
            <?php
                include('contribute_links.php');
            ?>
            </div>

            <div id="mainContentDetail">

<h1>Contribute to Cappuccino</h1>

<p>As an open source project, your contributions are important to the future of Cappuccino.  Whether you're looking to write code, add new documentation, or just report a bug, you'll be helping everyone who uses Cappuccino in the future.</p>

<h2>Getting the Code</h2>

<p>Cappuccino is hosted on <a href="http://github.com/cappuccino/cappuccino">Github</a> using the <a href="http://git-scm.com/">Git</a> version control system. You can get the code with the following command:</p>
<code>
git clone git://github.com/cappuccino/cappuccino.git
</code>

<p>If you don't have Git installed, don't worry, it's simple.  Check out the <a href="http://git-scm.com/download">official download page</a>, or view the installation guide on the <a href="http://git.or.cz/gitwiki/Installation">Git Wiki</a>.</p>

<p>You can also download the latest source code as a <a href="http://github.com/cappuccino/cappuccino/zipball/master">zip file</a> or <a href="http://github.com/cappuccino/cappuccino/tarball/master">tarball</a>. These links go to the top of the tree, but using Github, you can find any specific revision on any branch and download either file.</p>

<p>For help getting set up with the build tools and checking out the source code, follow <a href="http://wiki.github.com/cappuccino/cappuccino/getting-and-building-the-source">this tutorial</a>.</p>

<h2>Reporting Bugs</h2>

<p>We use the <a href="http://github.com/cappuccino/cappuccino/issues">GitHub issue tracker</a> to report and follow bugs in Cappuccino.  If you think you've found a problem in Cappuccino, you can always ask about it on the mailing list or in the IRC chat room, or you can search GitHub.  If you've discovered a new bug, report it!</p>

<h2>Contributing Code</h2>

<p>Patches can either be pasted to <a href ="http://gist.github.com/">gist</a>, or you can simply send us a pull request on GitHub. Patches should conform to the project's <a href="coding-style.php">coding style guidelines</a> as closely as possible.</p>

<p>Finally, if you don't already have one on file, you'll need to file a <a href="cla.php">Contributor License Agreement</a> using our online form.  The agreement is based on the one distributed by the Apache Software Foundation, with few changes. It protects 280 North, the Cappuccino Project, and anyone who uses the Cappuccino project. It also protects your own rights to the code you write. Code will not be accepted without a CLA. If you're doing work on Cappuccino as part of a company or other organization, please contact us at  <a href="mailto:developers@280north.com">developers@280north.com</a> so we can work out a corporate version of the agreement.</p>

<h2>Documentation, Wiki &amp; Tutorials</h2>

<p>Cappuccino documentation is integrated inline with Cappuccino code.  We use a custom documentation generating tool to create the docs on this site.  We'll be making that tool public in the future.  If you'd like to improve the documentation for a given section of the code, you can <a href="/learn/tutorials/checking-out.php">check out the source</a> and make your changes. When you're ready, go through the normal commit process to have your changes integrated with the project.</p>

<p>Github has in <a href="http://github.com/cappuccino/cappuccino/wikis">integrated wiki</a> which this project uses for collaboration. We keep a list of projects we think need the most attention and are worth working on, along with lots of other useful information for developers. This site also has a <a href="/learn/tutorials/">tutorial section</a> where we collect and link to tutorials. If you've written a tutorial, you can send us an e-mail at <a href="mailto:developers@280north.com">developers@280north.com</a> about getting it included on that page.</p>

            </div>

            <div style="clear: both;"></div>
        </div>
    </div>

<?php

include('../includes/footer.php');

?>