<?php

$active = "Learn";
$title = "Getting Set Up for Cappuccino"; 

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
            
<h1>Getting Set Up for Web Development with Cappuccino</h1>

<p>Programming for the browser is significantly different from other programming environments like a desktop OS, or even server side code. Cappuccino is largely aimed at minimizing these differences, but to be most productive you'll need to be familiar with the right set of tools. This tutorial is aimed at identifying the most useful tools for developing Cappuccino applications. If you're already ready to start programming your first Cappuccino application, try <a href="http://cappuccino.org/learn/tutorials/scrapbook-tutorial-1/">this tutorial</a>.</p>

<h2>Browsers</h2>

<p>The browser is the most important part of the development cycle. Cappuccino apps target the browser just like Cocoa apps target Mac OS X. Choosing the right browser for your development cycle is a crucial step in the process.</p>

<p>There's no one right answer to the question of which browser you should be using. There are four obvious contenders: Firefox, Safari, Chrome, and Internet Explorer.</p>

<h3>Firefox</h3>

<p>Many web developers today choose to go with the latest version of <a href="http://getfirefox.com">Firefox</a>. One of the biggest motivations for the choice is the availability of the Firebug extension. <a href="http://getfirebug.com">Firebug</a> gives you plenty of great features for debugging your applications like stack traces on exceptions, a JavaScript profiler for finding performance hot spots, and a monitor for all your http traffic, including XMLHTTPRequests. If you're going to use Firefox, Firebug is really an essential add-on to have.</p>

<center><img src="images/error.png" alt="firebug errors" /></center>

<p>Of all the browsers, Firefox also gives the most comprehensive error logs. In particular, parse errors tend to include specific issues and have helpful hints about where in the code to look for the problem. Other exceptions also usually report better errors than the other browsers. Even if you choose to use another browser for development, having a copy of Firefox around is good practice for solving hard to find problems.</p>

<center><img src="images/net.png" alt="firebug http inespector" /></center>

<h3>Safari</h3>

<p><a href="http://www.apple.com/safari/">Safari</a> is a somewhat less popular choice, especially because the shipping version of Safari has a somewhat poor set of developer tools. Fortunately that problem is being solved, and the <a href="http://nightly.webkit.org/">latest nightlies</a> have great additions to the Safari Web Inspector, including a debugger, profiler, and http monitor. To access the inspector, you'll need to check the "Show Develop menu in the menu bar" checkbox in the Advanced section of the preferences.</p>

<center><img src="images/develop1.png" alt="enable safari developer menu" /></center>

<p>Safari does has a few advantages over Firefox. First, it's a faster browser, especially at JavaScript. Although both browsers are fast, when you're in the rapid development cycle of programming, refreshing, and testing your changes, the extra speed boost can be useful. Second, and perhaps more importantly, Safari has a slightly different security model than Firefox when it comes to XMLHTTPRequests and the same origin policy.</p>

<p>In Safari, files running locally (i.e. file:///MyFolder/MyApplication/index.html) are allowed to access requests from any origin. This was designed so that Dashboard widgets could access external sites, but it's especially useful for application development.
You can leave a working copy of your application on a separate webserver or development box, and use it as your backend for local development, without worrying about the same origin policy.</p>

<p>It is also possible to configure Firefox 3 to behave similarly: <a href="http://wiki.github.com/280north/cappuccino/developing-locally-in-firefox-3">http://wiki.github.com/280north/cappuccino/developing-locally-in-firefox-3</a></p>

<center><img src="images/inspector.png" alt="webkit inspector" /></center>

<h3>Chrome <a name="chrome">&nbsp;</a></h3>

<p>Google's <a href="http://www.google.com/chrome">Chrome</a> browser is mostly the same as Safari, since it uses the same rendering engine as Safari, WebKit. The major difference is the security policies in place.</p>

<p>Unlike Safari, Chrome does not allow you to connect to remote hosts (violating the same origin policy) when running from file:///. Not only that, but the browser goes even further: XHR requests to any other file:/// address do not work when running from a local file. Because Cappuccino uses XHR requests to load your application, Chrome cannot run Cappuccino straight from the file system. Instead, you should run through a webserver (like Apache). You can <a href="http://code.google.com/p/chromium/issues/detail?id=41024">read more about this security policy</a> on Google's bug tracker.</p>

<p>If you've installed the Cappuccino tools, then you also installed a program called Narwhal, our command line JavaScript environment. You can use Narwhal to create a server in your current directory with this command:</p>
<pre><code>
jackup -e "require('jack/file').File('.')" -E deployment</code></pre>

<p>You may also need to install jack, which is as simple as running:</p>
<pre>
<code>
tusk install jack
</code>
</pre>

<h3>Internet Explorer</h3>

<p>Cappuccino works great in IE, and you should test your application in IE as often as possible. It is not recommended as a development environment though. IE's JavaScript interpreter is the slowest of the modern browsers, and it has some of the worst debugging tools.</p>

<p>That being said, since you should and will need to use IE from time to time, it's useful to know that there are tools out there to make your experience better. One is <a href="http://www.my-debugbar.com/wiki/CompanionJS/HomePage">Companion.js</a>, a tool that provides an interactive DOM inspector and JS console. Another is the <a href="http://www.microsoft.com/downloads/details.aspx?familyid=2f465be0-94fd-4569-b3c4-dffdf19ccd99&displaylang=en">MS Script Debugger</a>, which is required for parts of Companion.js to function properly, but is useful in its own right.</p>

<center><img src="images/companion.gif" alt="companion.js" /></center>

<a name="editors"></a>
<h2>Editors</h2>

<p>You can use whatever code editor you're familiar and comfortable with. Preferably you'll want one that at least supports JavaScript as a native language. Since Objective-J is very close to JavaScript, it makes the best choice for an editing mode if native Objective-J support is unavailable.</p>

<h3>Existing Editor Add-Ons</h3>
<ul>
    <li><a href="/files/objj.mode.zip">SubEthaEdit</a></li>
    <li><a href="http://panic.com/coda">Coda</a> for Mac OS X has built in support for Objective-J syntax highlighting.</li>
    <li><a href="/files/objj.tmbundle.zip">TextMate</a> - with updates from Vijay Kiran</li>
    <li><a href="/files/objj.vim">VIM</a> - thanks to Shawn MacIntyre</li>
    <li><a href="/files/Cappuccino_Developer_Tools.pkg">Xcode</a> - thanks to Raphael Bartolome</li>
</ul>
<p>If you use another text editor, and have written or would like to write an add-on for it to support Objective-J, we strongly encourage it and will list it here. Get in touch with us at <a href="mailto:developers@280north.com">developers@280north.com</a>.</p>

<h2>Logging</h2>

<p>Logging is an important part of the development process, especially when a debugger isn't available. Over the years, people have adapted various methods of logging in web applications. All of those methods will still work, and you should use them if you have a favorite.</p>

<p>Cappuccino does come with its own built in logger. CPLog is modeled after Apache's log4j, and is easy to use. Anywhere in your code, you can simply call CPLog("a message") to print that log. You can also use CPLog.error("an error"), CPLog.debug("a debug message"), and others. Logs are displayed in a popup log window, but they're turned off by default. To enable them, load index-debug.html instead of index.html. So, if I'm developing at:</p>

<code>
http://localhost/MyApp/
</code>

<p>I would instead go to:</p>

<code>
http://localhost/MyApp/index-debug.html
</code>

<p>to enable the debug console. This debug version of index.html uses un-minified versions of the frameworks, which can make debugging easier. The console can also be enabled by calling CPLogRegister(CPLogPopup) in your code. More documentation on CPLog will be made available soon.</p>

<h2>Compiler</h2>

<p>For those developers used to languages like Java, C++, or Objective-C, where the compiler is readily available to show you syntax and type errors, changing to Objective-J and JavaScript can be confusing at first. You will not be able to rely on a compiler to find these kinds of problems for you. Most of them will be found by the browser when you first load your application, and you'll find those errors buried in the JavaScript console of your respective browser. It's in the Debug menu in Safari, and in the Tools menu of Firefox (if you have Firebug installed, errors will appear in Firebug instead).</p>

<p>It's important to run your code often to make sure it still works. You don't want to end up with 300 new lines of code and no clue where the error has occurred. This is somewhat exacerbated by the fact that Objective-J has difficulty reporting the actual line number of errors. So remember to run your code often, and make use of the error console and the other tools you have available when you encounter trouble.</p>

<h2>Additional Info</h2>

<p>If you have suggestions for improvements to this guide, please send them to <a href="mailto:developers@280north.com">developers@280north.com</a>. If you have questions that haven't been answered here, you should try asking in the <a href="/discuss/list.php">mailing list or IRC channel</a>.</p>

</div>

            <div style="clear: both;"></div>
        </div>
    </div>

<?php 

include('../../includes/footer.php');

?>