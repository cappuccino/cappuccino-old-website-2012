<?php

$active = "Discuss";
$title = "Mailing List and IRC"; 
include('../includes/header.php');

?> 

    <div id="topContentWrapper"></div>
    
    <div id="mainContentWrapper">
        <div id="mainContent">

            <div id="subNavigation">
            <?php 
                $subActive = "Mailing List &amp; IRC";
                include('discuss_links.php');
            ?>
            </div>
            
            <div id="mainContentDetail">
            
                <h2>Mailing List &amp; IRC</h2>
                
                <p>Cappuccino and Objective-J share Google Group mailing lists.  There are three main lists:</p>
                <ul>
                
                    <li><h4>objective-j-announce</h4>
                    <p>Low traffic announcements only list. Only administrators can post to this list. Will be used for announcing new releases, major initiatives, etc.</p>
                
                    You can find the latest messages in this 
                    <a href="http://groups.google.com/group/objective-j-announce/feed/rss_v2_0_msgs.xml">RSS Feed</a>.  Or, sign up directly below.

                    <div id="uglyGoogleCode" style="background-color: rgb(255, 248, 240); border: 1px dotted rgb(64, 60, 55);">
                        <table border=0 style="padding: 5px;" cellspacing=0>
                          <tr><td style="padding-left: 5px">
                          <b>Subscribe to objective-j-announce</b>
                          </td></tr>
                          <form action="http://groups.google.com/group/objective-j-announce/boxsubscribe">
                          <tr><td style="padding-left: 5px;">
                          Email: <input type=text name=email>
                          <input type=submit name="sub" value="Subscribe">
                          </td></tr>
                        </form>
                        <tr><td align=right>
                          <a href="http://groups.google.com/group/objective-j-announce">Visit this group</a>
                        </td></tr>
                        </table>
                    </div>
                    </li>

                    <li><h4>objectivej (General)</h4>
                    <p>This list is for general discussion, questions, community announcements (your new project, for example), etc. Anyone can join, members can post, and it is unmoderated except for first time posters (to prevent spam).</p>
                
                    You can find the latest messages in this 
                    <a href="http://groups.google.com/group/objectivej/feed/rss_v2_0_msgs.xml">RSS Feed</a>.  Or, sign up directly below.

                    <div id="uglyGoogleCode" style="background-color: rgb(255, 248, 240); border: 1px dotted rgb(64, 60, 55);">
                        <table border=0 style="padding: 5px;" cellspacing=0>
                          <tr><td style="padding-left: 5px">
                          <b>Subscribe to objectivej</b>
                          </td></tr>
                          <form action="http://groups.google.com/group/objectivej/boxsubscribe">
                          <tr><td style="padding-left: 5px;">
                          Email: <input type=text name=email>
                          <input type=submit name="sub" value="Subscribe">
                          </td></tr>
                        </form>
                        <tr><td align=right>
                          <a href="http://groups.google.com/group/objectivej">Visit this group</a>
                        </td></tr>
                        </table>
                    </div>
                    </li>

                    <li><h4>objectivej-dev</h4>
                    <p>This list is for development discussion. Commit messages are sent to this address. Code reviews on all commits are welcome and encouraged. Architectural questions, ideas, etc. also welcome. If you're looking for something to work on, this is the right place to look.</p>
                
                    You can find the latest messages in this 
                    <a href="http://groups.google.com/group/objectivej-dev/feed/rss_v2_0_msgs.xml">RSS Feed</a>.  Or, sign up directly below.

                    <div id="uglyGoogleCode" style="background-color: rgb(255, 248, 240); border: 1px dotted rgb(64, 60, 55);">
                        <table border=0 style="padding: 5px;" cellspacing=0>
                          <tr><td style="padding-left: 5px">
                          <b>Subscribe to objectivej-dev</b>
                          </td></tr>
                          <form action="http://groups.google.com/group/objectivej-dev/boxsubscribe">
                          <tr><td style="padding-left: 5px;">
                          Email: <input type=text name=email>
                          <input type=submit name="sub" value="Subscribe">
                          </td></tr>
                        </form>
                        <tr><td align=right>
                          <a href="http://groups.google.com/group/objectivej-dev">Visit this group</a>
                        </td></tr>
                        </table>
                    </div>
                    </li>
                    </ul>
                <h3>IRC</h3>
                <p>Quick immediate help is usually available in the Cappuccino IRC room.  Details:</p>

<code><a href="irc://irc.freenode.net#cappuccino">
Server: irc.freenode.net
Room:   #cappuccino</a>
</code>
<p>Or <a href="http://embed.mibbit.com/?server=irc.freenode.com&amp;channel=%23cappuccino" target="_blank">join the chat now</a> in your browser.</p>

            </div>
            
            <div style="clear: both;"><br /><br /></div>
        </div>
    </div>

<?php 

include('../includes/footer.php');

?>