<?php

$active = "Discuss";
$title = "Frequently Asked Questions";

include('../includes/header.php');

?>

    <div id="topContentWrapper"></div>

    <div id="mainContentWrapper">
        <div id="mainContent">

            <div id="subNavigation">
            <?php
                $subActive = "Frequently Asked Questions";
                include('discuss_links.php');
            ?>
            </div>

            <div id="mainContentDetail">

                <a name="top"></a>
                <h2>Frequently Asked Questions</h2>

                <ul id="questions">
                    <li><a href="#objective-j">What is Objective-J?</a></li>
                    <li><a href="#cappuccino">What is Cappuccino?</a></li>
                    <li><a href="#where">Where can I get Cappuccino?</a></li>
                    <li><a href="#license">What license is Cappuccino available under?</a></li>
                    <li><a href="#proprietary">Can I mix Cappuccino with proprietary (non open-source) software?</a></li>
                    <li><a href="#subclassing">How does the LGPL affect things like subclasses and categories?</a></li>
                    <li><a href="#how">How do I use Cappuccino and Objective-J?</a></li>
                    <li><a href="#who">Who is responsible for this?</a></li>
                    <li><a href="#different">How is Cappuccino different from other web frameworks?</a></li>
                </ul>

                <div class="answer">

                    <a name="objective-j"></a>
                    <h3>What is Objective-J?</h3>

                    <p>Objective-J is a programming language.  It's very similar to both JavaScript and Objective-C.  In fact, any valid JavaScript is valid Objective-J.  The language adds traditional inheritance, dynamic message passing, and a few other nice things to pure JavaScript. <a href="/learn/">Learn more</a>.</p>

                    <p><a href="#top">top</a></p>

                </div>

                <div class="answer">

                    <a name="cappuccino"></a>
                    <h3>What is Cappuccino?</h3>

                    <p>Cappuccino is an application development framework written in Objective-J.  It's designed for building rich applications that run in a web browser.  Cappuccino implements the GNUstep/OpenStep/Cocoa APIs, and builds on some of the best Desktop programming paradigms in existance. <a href="/learn/">Learn more</a>.</p>

                    <p><a href="#top">top</a></p>

                </div>

                <div class="answer">

                    <a name="where"></a>
                    <h3>Where can I get Cappuccino?</h3>

                    <p>You can <a href="/download/">download a copy of the framework here</a>, or you'll find the source at our <a href="http://github.com/cappuccino/cappuccino">github project page</a>.</p>

                    <p><a href="#top">top</a></p>

                </div>

                <div class="answer">

                    <a name="license"></a>
                    <h3>What license is Cappuccino available under?</h3>

                    <p>Cappuccino is released under the <a href="/learn/lgpl.txt">LGPL</a>. For more information, see our <a href="/learn/licensing.php">licensing page</a>.</p>

                    <p><a href="#top">top</a></p>

                </div>

                <div class="answer">

                    <a name="proprietary"></a>
                    <h3>Can I mix Cappuccino with proprietary (non open-source) software?</h3>

                    <p>Absolutely.  Under the terms of the LGPL, you can use Cappuccino and Objective-J in any project, whether or not that project is open source.  If you'd like to modify the actual Cappuccino frameworks, or the language, for your own use, you'll need to release those changes under the LGPL.  </p>

                    <p><a href="#top">top</a></p>

                </div>

                <div class="answer">

                    <a name="subclassing"></a>
                    <h3>How does the LGPL affect things like subclasses and categories?</h3>

                    <p>Subclassing classes like CPView is an important technique used in Cappuccino.  You can absolutely subclass or write a category for any class in Cappuccino without worrying about needing to distribute your code.  Only when you modify existing code, or when your code needs to live in /AppKit or /Foundation are you required to release it under the LGPL.</p>

                    <p><a href="#top">top</a></p>

                </div>

                <div class="answer">

                    <a name="how"></a>
                    <h3>How do I use Cappuccino and Objective-J?</h3>

                    <p>First, <a href="/download/">download the projects</a>.  Then, try one of our getting started <a href="/learn/tutorials/">tutorials</a>.  Finally, you may want to read through our <a href="/learn/documentation/"> documentation</a>.</p>

                    <p><a href="#top">top</a></p>

                </div>

                <div class="answer">

                    <a name="who"></a>
                    <h3>Who is responsible for this?</h3>

                    <p>Cappuccino and Objective-J are open source software, meaning a lot of people are responsible for various parts of the projects.  Both Cappuccino and Objective-J are sponsored and maintained by <a href="http://280north.com">280 North</a>.</p>

                    <p><a href="#top">top</a></p>

                </div>

                <div class="answer">

                    <a name="different"></a>
                    <h3>How is Cappuccino different from other web frameworks?</h3>

                    <p>Cappuccino is different in a lot of ways, but most importantly in that its designed to build applications, not just web sites. <a href="/learn/">Read this</a> to learn more. </p>

                    <p><a href="#top">top</a></p>

                </div>


            </div>

            <div style="clear: both;"></div>
        </div>
    </div>

<?php

include('../includes/footer.php');

?>