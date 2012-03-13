<?php

$title = "Build Desktop Class Applications in Objective-J and JavaScript";
$active = "Home";
include('includes/header.php');

?>

    <div id="topContentWrapper">
        <div id="topContent">
            <div id="topLeftContent">
                <img width="300" height="300" id="logoImage" src="images/cappuccino-icon.png" alt="cappuccino"/>
                <h2 id="cappuccinoTagline">
                    Cappuccino is an open source framework that makes it easy
                    to build desktop-caliber applications that run in a web browser.
                </h2>
            </div>
            <div id="topRightContent">
                <div>
                    <h2><a href="/learn/">Learn</a></h2>
                    <p>Read all about <a href="/learn/">Cappuccino and Objective-J</a>, see <a href="/learn/demos">demos</a>, and work
                    through <a href="/learn/tutorials/">tutorials</a>, and browse the
                    <a href="/learn/documentation/">documentation</a>.</p>
                </div>
                <div>
                    <h2><a href="/discuss/">Discuss</a></h2>
                    <p>Ask <a href="/discuss/list.php">questions</a>, get <a href="/discuss/faq.php">answers</a>,
                    <a href="/discuss/events/">meet </a> other developers, and see the
                    <a href="http://www.reddit.com/r/Cappuccino/">latest news</a>.</p>
                </div>
                <div>
                    <h2><a href="/contribute/">Contribute</a></h2>
                    <p>File <a href="http://github.com/cappuccino/cappuccino/issues">bug reports</a>, check out the <a href="http://github.com/cappuccino/cappuccino">source code</a>,
                    and <a href="http://github.com/cappuccino/cappuccino/wikis/projects-to-work-on">contribute back</a> to the project.</p>
                </div>
                <div>
                    <h2><a href="/download/">Download</a></h2>
                    <p>Get the latest version of the frameworks, and an empty project template.
                    No plugins or installation required. <a href="/starter">Direct link</a>.</p>
                </div>
            </div>
            <div style="clear:both;"></div>
        </div>
    </div>

    <div id="mainContentWrapper">
        <div id="mainContent">

        <?php /*

            <!-----
            <div id="quoteSection">
                This is the place where people like Tim O'Reilly talk about how Cappuccino
                and Objective-J are going to change the way people build web apps.
            </div>
            <div id="quoteCredit">
                -Tim O'Reilly, Founder of O'Reilly Media
            </div>
            ----->

        */ ?>

            <div id="pressSection">
                <h2>The Buzz</h2>
                <div class="pressPost">
                    <img class="pressImage" src="images/ars.png" alt="ars technica" />
                    <h3><a href="http://arstechnica.com/journals/apple.ars/2008/06/26/cocoa-on-the-web-280-north-objective-j-and-cappuccino">Cocoa on the web: 280 North, Objective-J, and Cappuccino</a></h3>
                    <p>...from what I have experienced using 280 Slides, a future with
                    Cappuccino based-apps is a bright one.</p>
                    <h4>Chris Foresman, Ars Technica</h4>
                </div>
                <div class="pressPost">
                    <img class="pressImage" src="images/carsonified.png" alt="carsonified" />
                    <h3><a href="http://www.carsonified.com/web-apps/why-objective-j-cappuccino-and-sproutcore-are-completely-changing-the-web-app-industry">Why Objective-J, Cappuccino and SproutCore are
                    completely changing the web app industry</a></h3>
                    <p>...if you use Cappuccino, those apps will automatically look and behave like ... desktop apps - with zero learning curve on the developer's side. He or she can simply focus on building an kick ass app instead of trying to re-invent basic UI functionality every single time.</p>
                    <h4>Ryan Carson, Carsonified</h4>
                </div>
                <div class="pressPost">
                    <img class="pressImage" src="images/ajaxian.png" alt="ajaxian" />
                    <h3><a href="http://ajaxian.com/archives/an-interview-with-280-north-on-objective-j-and-cappuccino">An interview with 280 North on Objective-J and Cappuccino</a></h3>
                    <p>I can see the allure of Objective-J / Cappuccino for building desktop-like Web applications. It gives you a very high level abstraction over the browser. No more DOM. No more CSS layouts, which can be the bane of your existence for a complicated and dynamic layout.</p>
                    <h4>Dion Almaer, Ajaxian</h4>
                </div>
            </div>

            <div id="blogPosts">
                <h2><a href="/discuss/">Cappuccino Blog</a></h2>
                <ul>
                    <? @include ($_SERVER['DOCUMENT_ROOT'].'/discuss/newest2.php'); ?>
                </ul>

                <h2><a href="http://www.reddit.com/r/Cappuccino/">Latest News</a></h2>
                <ul>
                    <? @include ($_SERVER['DOCUMENT_ROOT'].'/discuss/reddit.php'); ?>
                </ul>
            </div>

            <div style="clear: both;"></div>
        </div>
    </div>

<?php

include('includes/footer.php');

?>