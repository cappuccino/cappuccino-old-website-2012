<?php

$active = "Learn";
$title = "How to enable JavaScript"; 
include('../includes/header.php');

?>

    <div id="topContentWrapper">
                <script>
                    <!--
                        document.write("<div class=\"yesJS\">JavaScript is already enabled in your browser.  You do not need to follow the steps on this page.</div>");
                    -->
                </script>
                
                <noscript>
                    <div class="noJS">
                        JavaScript is currently disabled in your browser.  Follow the steps below to enable it.
                    </div>
                </noscript>    
    </div>
    
    <div id="mainContentWrapper">
        <div id="mainContent">

            
            <div id="mainContentDetail">
            
                <h2>How to enable JavaScript in your browser</h2>

                <?php
                
                    $userAgent = $_SERVER['HTTP_USER_AGENT'];
                
                    // Operating systems
                    $os = "Unknown"; // Default value
                    if (strpos($userAgent, 'Mac')) {
                        $os = "Mac OS X";
                    } else if (strpos($userAgent, 'Win')) {
                        $os = "Windows"; 
                    } else if (strpos($userAgent, 'Linux')) {
                        $os = "Linux";
                    }
                
                    // Browsers
                    if (!isset($browser))
                    {
                        $browser = "Unknown"; // Default value
                        
                        if (strpos($userAgent, 'Safari'))
                            $browser = "Safari";
                        else if (strpos($userAgent, 'Firefox/3.0'))
                            $browser = "Firefox 3.x";
                        else if (strpos($userAgent, 'Firefox/2.0')) 
                            $browser = "Firefox 2.x";
                        else if (strpos($userAgent, 'Firefox/1.5')) 
                            $browser = "Firefox 1.5x";
                        else if (strpos($userAgent, 'Firefox/1.0')) 
                            $browser = "Firefox 1.0x";
                        else if (strpos($userAgent, 'Opera/9') > -1) 
                            $browser = "Opera 9.x";
                        else if (strpos($userAgent, 'MSIE 5')) 
                            $browser = "Internet Explorer 5.x";
                        else if (strpos($userAgent, 'MSIE 6')) 
                            $browser = "Internet Explorer 5.x";
                        else if (strpos($userAgent, 'MSIE 7')) 
                            $browser = "Internet Explorer 5.x";
                        else if (strpos($userAgent, 'MSIE 7')) 
                            $browser = "Internet Explorer 5.x";
                    }
                    echo "\n\t\t<!--\n";
                    echo "\t\t\tDetected environment\n";
                    echo "\t\t\t====================\n";
                    echo "\t\t\tOperating System: " . $os . "\n";
                    echo "\t\t\tBrowser: " . $browser . "\n";
                    echo "\t\t\tUser Agent: " . $userAgent . "\n";
                    echo "\t\t-->\n";
                
                    if ($browser == "Safari") { // Safari
                        if ($os == "Mac OS X") {
                            include'safari_3_mac.php';
                        } else {
                            include'safari_3.php';
                        }
                    } else if ($browser == "Firefox 3.x") { // Firefox
                        if ($os == "Mac OS X") {
                            include'firefox_3_mac.php';
                        } else {
                            include'firefox_3.php';
                        }
                    } else if ($browser == "Firefox 2.x") {
                        if ($os == "Mac OS X") {
                            include'firefox_2_mac.php';
                        } else {
                            include'firefox_2.php';
                        }
                    } else if ($browser == "Firefox 1.5x") {
                        if ($os == "Mac OS X") {
                            include'firefox_1_5_mac.php';
                        } else {
                            include'firefox_1_5.php';
                        }
                    } else if ($browser == "Firefox 1.0x") {
                        if ($os == "Mac OS X") {
                            include'firefox_1_mac.php';
                        } else {
                            include'firefox_1.php';
                        }
                    } else if ($browser == "Opera 9.x") { // Opera
                        if ($os == "Mac OS X") {
                            include'opera_9_mac.php';
                        } else {
                            include'opera_9.php';
                        }
                    } else if ($browser == "Opera 8.x") {
                        if ($os == "Mac OS X") {
                            include'opera_8_mac.php';
                        } else {
                            include'opera_8.php';
                        }
                    } else if ($browser == "Internet Explorer 5.x") { // IE
                        if ($os == "Mac OS X") {
                            include'explorer_5_mac.php';
                        } else {
                            include'explorer.php';
                        }
                    } else { // Other
                        include'unknown.php';
                    }
                
        
                ?>

            </div>
            
            <div style="float:right; width: 180px; padding-left:10px; padding-top:10px;">
                <p>Want to see the instructions for another browser?</p>
                <ul style="padding-left:20px;">
                    <li><a href="safari_3_mac.php">Safari Mac</a></li>
                    <li><a href="safari_3.php">Safari Windows</a></li>
                    <li><a href="firefox_3_mac.php">Firefox 3 Mac</a></li>
                    <li><a href="firefox_3.php">Firefox 3 Windows</a></li>
                    <li><a href="opera_9_mac.php">Opera 9 Mac</a></li>
                    <li><a href="opera_9.php">Opera 9 Windows</a></li>
                </ul>
                <p>Don't see your browser? Try searching Google for <a href="http://google.com/search?q=enable+javascript">"enable JavaScript"</a>.</p>
            </div>
            
            <div style="clear: both;"></div>
        </div>
    </div>


<?php 
include('../includes/footer.php');
?>
