<?php

$active = "Learn";
$title = "Automatic Layout"; 

include('../../../includes/header.php');

?>
    <style type="text/css" media="screen">@import "/includes/tutorial.css";</style>
    
    <div id="topContentWrapper"></div>
    
    <div id="mainContentWrapper">
    
        <div id="mainContent">

            <div id="subNavigation">
            <?php 
                $subActive = "Tutorials";
                include('../../learn_links.php');
            ?>
            </div>
            
<div id="mainContentDetail">

    <h1>Automatic Layout Support in Cappuccino</h1>
                
    <div class = "contentsection codesection">
    
        <h3>Overview</h3>
        
        <div class = "contentbody">
        In this tutorial we will be covering the automatic layout techniques used in Cappuccino with <strong>autoresizing flags</strong>.  We'll learn how to build simple and complex layouts that change appropriately as the user changes their size.  Download the sample code below to follow along with the examples provided later in this lesson.
        </div>

        <div class="cl">&nbsp;</div>
                    
        <div class="overview">
        
            <div style = "float:right; margin-right:20px;">
                <h3>Resources</h3>
                <ul>
                    <li><a href = "AutomaticLayout.zip"><img src = "images/zip.png" align = "center" style = "padding-right:5px;"/>Download the sample code</a></li>
                </ul>
            </div>
            
            <h3>Topics Covered</h3>
            
            <ul>
                <li><a href = "#AutomaticResizing">Automatic Resizing</a></li>
                <li><a href = "#AutomaticRepositioning">Automatic Repositioning</a></li>
            </ul>
            
        </div>

    </div>
                
                
                <!-- -->
                
    <div class="contentsection codesection">	
		
        <div class="pagefold"><span>1</span></div>

        <h3>How Automatic Layout Works</h3>

        <div class="contentbody">
        Cappuccino defines a variety of ways to manage the layout of views.  Some views, such as CPCollectionView and CPSplitView, manage the layout of their internal views for you.  But often times you will want to implement your own custom layout.  Cappuccino makes it very easy to size and position views, but it is then up to you to also handle resizing and repositioning them as changes occur.  One option in this case is to implement the <span class = "selector">resizeSubviewsWithOldSize:</span> method provided in CPView that gets called on a view every time it changes size.  From here, you can rearrange all your subviwews however you see fit.  Alternatively, you can implement <span class = "selector">resizeWithOldSuperviewSize:</span>, which gets called every time a view's <strong>superview</strong> size gets changed.  In this case, it is up to the subviews to rearrange themselves.  However, both of these methods are quite tedious and a bit overkill for most layout tasks.
        </div>
        
        <div class="cl">&nbsp;</div>
        
        <div class="contentbody">
        This is where the <strong>autoresizing flags</strong> in Cappuccino and automatic layout come in.  The central idea behind automatic layout is that relayout takes place in response to a parent view changing size.  Thus, you can think of automatic layout with autoresizing flags as a "recursive" process.  Instead of creating container views that are responsible for keeping their views appropriately arranged, autoresizing flags allow each each individual view to describe how it would like to resized and repositioned relative to the changes taking place in it's superview.  In this way, as each view changes size, the resizing and repositioning is "cascaded" down.  This does away with a lot of complexity of unecessary "manager" views and controllers that can make UI programming quite difficult.  The key to remember when using autoresizing flags is that the views in question do everything based solely on what happens to their superviews.  If you  keep this in mind, you will find that many seemingly complex layouts can be expressed quite easily.
        </div>

        <div class="cl">&nbsp;</div>
        
        <div class="featuredimagebox">
            <img src="images/resizingandall.png" width = "326" height = "499" style="margin: 0px 0px 0px 0px;" />
        </div>
        
        <div class="contentbody">	
            To use automatic layout we will be using the <span class = "selector">setAutoresizingMask:</span> method defined in CPView.  To use this method, you will have to familiarize ourselves with the concept of "masks".  Masks are just variables that can be OR'ed together to create more complex descriptions.  Cappuccino uses masks to represent each of the different layout values.  For example, if you wanted a view to use both the CPViewWidthSizable flag and the CPViewHeightSizable flag, you can pute them together with the | operator as so:
        </div>
		
        <div class="cl">&nbsp;</div>

        <div class="codeblock">[myView <span class = "selector">setAutoresizingMask:</span>CPViewWidthSizable | CPViewHeightSizable];</div>

        <div class="contentbody">
            You can then retrieve the mask by using the <span class = "selector">autoresizingMask</span> method.
        </div>
        
    </div>

    <div class="contentsection codesection">	
        
        <a name = "AutomaticResizing"></a>
		
		<div class="pagefold"><span>2</span></div>
		
        <h3>Automatic Resizing</h3>

        <div class="contentbody">
            The two flags that control how a view resizes are CPViewWidthSizable and CPViewHeightSizable.  By setting your view with these flags, you tell it to grow and shrink with the containing view:
        </div>

        <div class="cl">&nbsp;</div>
        
        <div class="featuredimagebox">
            <img src="images/Sizable.png" width = "346" height = "224" style="margin: 0px 0px 0px 0px;" />
        </div>

        <div class="contentbody">
            A good example of this would be when you want a view to remain the exact same size as it's superview.  In this case, you want to use both of these flags together:
        </div>
        
        <div class="cl">&nbsp;</div>
    
        <div class="codeblock">[view <span class = "selector">setFrame:</span>[[view <span class = "selector">superview</span>] <span class = "selector">bounds</span>]];
[view <span class = "selector">setAutoresizingMask:</span>CPViewWidthSizable | CPViewHeightSizable];</div>

        <div class="contentbody">
            Here you can see a very common design pattern in Cappuccino layout.  We've started by arranging the views the way we want them to currently be, and then defined how they should adjust when changes take place.  Since we wanted the view in question to follow the size of it's superview, we first set it's frame to be equal to the superview's bounds.  We then set both the CPViewWidthSizable and CPViewHeightSizable flags so that as the superview grows the view does as well.
        </div>

    </div>
    
    <div class="contentsection codesection">	
		
        <a name = "AutomaticRepositioning"></a>
		
		<div class="pagefold"><span>3</span></div>

        <h3>Automatic Repositioning</h3>

        <div class="contentbody">
            Setting up how a view repoisitions itself is slightly more complex, as there are four different flags that control this behavior: CPViewMinXMargin, CPViewMaxXMargin, CPViewMinYMargin, and CPViewMaxYMargin.  These four flags represent the four regions around the view: left, right, top, and bottom, respectively.  By setting any one of these flags, you are specifying that you want this area to be "flexible", and stretch and shrink with the superview:
        </div>
            
        <div class="cl">&nbsp;</div>
        
        <div class="featuredimagebox">
            <img src="images/Positioning.png" width = "600" height = "381" style="margin: 0px 0px 0px 0px;" />
        </div>
            
        <div class="contentbody">
            An alternative way to think of this is that by <strong>not</strong> setting these flags, you are specifying that that particular area around the view should remain <strong>constant</strong>.  A good example of using these flags is when you want to <strong>center</strong> a view.  In this case, we want flexible space all around the view so that it stays put in the center:
        </div>
        
        <div class="cl">&nbsp;</div>
        
        <div class="codeblock">[view <span class = "selector">setFrameOrigin:</span>CGPointMake(centerX, centerY)];
[view <span class = "selector">setAutoresizingMask:</span>  CPViewMinXMargin | 
                            CPViewMaxXMargin | 
                            CPViewMinYMargin | 
                            CPViewMaxYMargin];</div>
            
        <div class="contentbody">
            Notice that just as before, we begin by placing the view where it should go.  Here centerX and centerY are assumed to be precomputed values.  After this is done, we set the four flags, which will keep the view in the center as the superview grows and shrinks.  This is completely deterministic and will work in every browser.
        </div>

        </div>
        
    <div class="contentsection codesection">	
		
		<div class="pagefold"><span>4</span></div>

        <h3>More Complex Examples</h3>
        
        <div class="contentbody">
            Now that we've got the basics down, let's move on to some more real world examples.  A good place to start is with the classic alert dialog.  In this case we have four elements that we want to be laying out: an icon, a text blurb, and two buttons:
        </div>
        
        <div class="cl">&nbsp;</div>
        
        <div class="featuredimagebox">
            <img src="images/alertWindow.png" width = "420" height = "203" style="margin: 0px 0px 0px 0px;" />
        </div>

        <div class="contentbody">
            We begin by looking at each of these elements independently and see how they should reflow as the window changes size.  The icon on the left is easy, it should stay tied to the top left.  If you recall from before, another way of saying this is that it should only have flexible space to it's bottom and right:
        </div>

        <div class="cl">&nbsp;</div>

        <div class="featuredimagebox">
            <img src="images/alertWindowIconView.png" width = "420" height = "203" style="margin: 0px 0px 0px 0px;" />
        </div>

        <div class="contentbody">
    		  And so, we should use both CPViewMaxXMargin and CPViewMaxYMargin:
        </div>
        
        <div class="cl">&nbsp;</div>
        
        <div class="codeblock">[iconView <span class = "selector">setAutoresizingMask:</span>CPViewMaxXMargin | CPViewMaxYMargin];</div>

        <div class="contentbody">
            The text blurb is also quite simple, as it should simply grow along with the window:
        </div>
        
        <div class="cl">&nbsp;</div>
        
        <div class="featuredimagebox">
            <img src="images/alertWindowTextField.png" width = "420" height = "203" style="margin: 0px 0px 0px 0px;" />
        </div>
        
        <div class="contentbody">
    		  Since we want it to stretch in both directions, we'll use CPViewWidthSizable and CPViewHeightSizable:
        </div>
        
        <div class="cl">&nbsp;</div>

        <div class="codeblock">[textField <span class = "selector">setAutoresizingMask:</span>CPViewWidthSizable | CPViewHeightSizable];</div>

        <div class="contentbody">
            Now, the buttons on the bottom are actually almost the same case as the icon on the top left.  The only difference is that we want the buttons to stay glued to the bottom right:
        </div>
        
        <div class="cl">&nbsp;</div>
        
        <div class="featuredimagebox">
            <img src="images/alertWindowCancelButton.png" width = "420" height = "203" style="margin: 0px 0px 0px 0px;" />
        </div>
        
        <div class="contentbody">
            So naturally we will want to use CPViewMinXMargin and CPViewMinYMargin:
        </div>
        
        <div class="cl">&nbsp;</div>

        <div class="codeblock">[cancelButton <span class = "selector">setAutoresizingMask:</span>CPViewMinXMargin | CPViewMinYMargin];
[okButton <span class = "selector">setAutoresizingMask:</span>CPViewMinXMargin | CPViewMinYMargin];</div>
    		
        <div class="contentbody">
            If you've downloaded the accompanying code you can go ahead and try this out for yourself.  You'll see that the window now resizes appropriately, with each of the individual subviews moving accordingly.
        </div>

        <div class="cl">&nbsp;</div>
        
        <div class="contentbody">
            Let's now move to a slightly more complicated example by taking a look at iTunes:
        </div>
        
        <div class="cl">&nbsp;</div>
        
        <div class="featuredimagebox">
            <img src="images/iTunes.png" width = "500" height = "370" style="margin: 0px 0px 0px 0px;" />
        </div>
    
        <div class="contentbody">
            Although there seems to be a lot going on here, if we take a 10,000 foot view we can split up most the elements in iTunes into three generic portions: a file listing or "navigation area" on the left, a "content area" on the right, and a small "meta data area" on the bottom left:
        </div>
    
        <div class="cl">&nbsp;</div>
                
        <div class="featuredimagebox">
            <img src="images/iTunesOverlay.png" width = "520" height = "391" style="margin: 0px 0px 0px 0px;" />
        </div>   

        <div class="contentbody">
            Once we've broken it down like this, we can see that in fact many applications use this general layout.  For example, iCal is almost identical in this sense:
        </div>
    
        <div class="cl">&nbsp;</div>
    
        <div class="featuredimagebox">
            <img src="images/iCalOverlay.png" width = "520" height = "391" style="margin: 0px 0px 0px 0px;" />
        </div>   

        <div class="contentbody">
            As is 280 Slides:
        </div>

        <div class="cl">&nbsp;</div>

        <div class="featuredimagebox">
            <img src="images/280SlidesOverlay.png" width = "520" height = "391" style="margin: 0px 0px 0px 0px;" />
        </div>   
    		
        <div class="contentbody">
            Again, we can quickly tackle this behavior by examining each individual view <strong>independently</strong> and seeing how it should resize on it's own:
        </div>

        <div class="cl">&nbsp;</div>

        <div class="featuredimagebox">
            <img src="images/JustOverlay.png" width = "516" height = "348" style="margin: 0px 0px 0px 0px;" />
        </div>   
            
        <div class="contentbody">
            Now, the navigation area only resizes vertically, but also allows for flexible space on it's right:
        </div>

        <div class="cl">&nbsp;</div>

        <div class="featuredimagebox">
            <img src="images/navigationArea.png" width = "516" height = "348" style="margin: 0px 0px 0px 0px;" />
        </div>  

        <div class="contentbody">            
            So for the first time, we will combine our sizing and positioning flags and use CPViewHeightSizable alongside CPViewMaxXMargin:
        </div>
        

        <div class="cl">&nbsp;</div>
        
        <div class="codeblock">[navigationArea <span class = "selector">setAutoresizingMask:</span>CPViewHeightSizable | CPViewMaxXMargin];</div>
    		
        <div class="contentbody">
            The content area on the other hand is quite simple, as it just grows and shrinks with the containing window, something we're quite familiar with handling now:
        </div>
    		
        <div class="cl">&nbsp;</div>
    		
        <div class="featuredimagebox">
            <img src="images/contentArea.png" width = "516" height = "348" style="margin: 0px 0px 0px 0px;" />
        </div>  
    		
        <div class="contentbody">
            Just as before, simply use CPViewWidthSizable and CPViewHeightSizable:
        </div>    		

        <div class="cl">&nbsp;</div>
        
        <div class="codeblock">[contentArea <span class = "selector">setAutoresizingMask:</span>CPViewWidthSizable | CPViewHeightSizable];</div>

        <div class="contentbody">
            Last but not least, the "meta data area" on the bottom left should stay anchored there:
        </div>

        <div class="cl">&nbsp;</div>
    		
        <div class="featuredimagebox">
            <img src="images/metaDataArea.png" width = "516" height = "348" style="margin: 0px 0px 0px 0px;" />
        </div>    		

        <div class="contentbody">
            So, quite similar to the icon and buttons in the last example, just use CPViewMinYMargin for flexible space above it, and CPViewMaxXMargin for flexible space to the right:
        </div>
        
        <div class="cl">&nbsp;</div>
        
        <div class="codeblock">[metaDataArea <span class = "selector">setAutoresizingMask:</span>CPViewMinYMargin | CPViewMaxXMargin];</div>
        
        <div class="contentbody">
            After this, the general layout should work.  It seems a bit anticlimactic, but that's because relatively complex layouts can be expressed quite simply with these flags.
        </div>
		
    </div>
    
    <div class="contentsection codesection">	
		
        <div class="pagefold"><span>5</span></div>

        <h3>Conclusion</h3>

        <div class="contentbody">
            As you can see, despite being quite simple, <strong>autoresizing flags</strong> can create a wide variety of different layout behaviors.  Chances are you will be able to describe most if not all the complex resizing behavior in your application just with a few calls to <span class = "selector">setAutoresizingMask:</span>, allowing you to avoid having to program time consuming UI management code.
        </div>

    </div>
		             
            <div id="disqus_thread"></div><script type="text/javascript" src="http://disqus.com/forums/cappuccino/embed.js"></script><noscript><a href="http://cappuccino.disqus.com/?url=ref">View the discussion thread.</a></noscript><a href="http://disqus.com" class="dsq-brlink">blog comments powered by <span class="logo-disqus">Disqus</span></a>   
            </div>
            
        
            <div style="clear: both;"></div>
        </div>
    </div>

<?php 

include('../../../includes/footer.php');

?>