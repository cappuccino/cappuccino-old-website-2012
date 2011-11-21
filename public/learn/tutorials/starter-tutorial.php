<?php

$active = "Learn";
$title = "Cappuccino Starter Tutorial"; 

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
            
                <h1>Downloading & Running the Sample Application</h1>
            
<p>If you haven't already, download the <a href="/starter">Cappuccino Starter package</a>. This zip file includes a sample application (NewApplication), licensing info, a script you can run later to download all the Cappuccino tools, and a README.</p>

<center><img src="images/new-application.png" alt="open new application" /></center>

<h3>Running NewApplication</h3>
<p>Once you've downloaded and unzipped the Cappuccino Starter package, open up the <em>NewApplication</em> folder, and locate the <em>index.html</em> file. Now, simply open that file in your favorite web browser by double-clicking it, or just by dragging it on top of your browser application. You should end up with something that looks like this (in Safari):</p>

<center><img src="images/new-app-running-safari.png" alt="new application running in safari" /></center>

<p><b>Chrome Users please note</b> that you'll need to run Cappuccino through a web server, rather than through the filesystem directly as described in the paragraph above. You can read more <a href="/learn/tutorials/getting-setup.php#chrome">here</a>.</p>

<h3>The Code</h3>
<p>The source behind this sample application is startlingly simple. Although there are a few files, the only one we're interested in right now is <em>AppController.j</em>. The others are necessary, but you don't need to modify them to work on your application.</p>

<center><img src="images/new-app-appcontroller.png" alt="appcontroller.j" /></center>

<p>You can see in the image above that we have syntax highlighting in TextMate. You can get this by installing the appropriate mode, found on our <a href="getting-setup.php#editors">getting set up tutorial</a>.</p>

<h3>Making a Simple Change</h3>

<p>Now let's see what it takes to make a simple addition to NewApplication. We'll add a button that toggles the text on the screen between "Hello World!" and "Goodbye!". After the line that contains <em>[contentView addSubview:label]</em> (line 31), add the following code snippet:</p>
        
<code class="action">
var button = [[CPButton alloc] initWithFrame: CGRectMake(
                CGRectGetWidth([contentView bounds])/2.0 - 40,
                CGRectGetMaxY([label frame]) + 10,
                80, 24
             )];
                          
[button setAutoresizingMask:CPViewMinXMargin | 
                            CPViewMaxXMargin | 
                            CPViewMinYMargin | 
                            CPViewMaxYMargin];

[button setTitle:"swap"];

[button setTarget:self];
[button setAction:@selector(swap:)];                
              
[contentView addSubview:button];
</code>
        
<p>Now, refresh your browser, and you should see a button right below "Hello World!". It won't work just yet, because we haven't told it what to do when the button is pressed. Before we do that, let's quickly go over what each of the previous lines does:</p>

<code>
var button = [[CPButton alloc] initWithFrame: CGRectMake(
                CGRectGetWidth([contentView bounds])/2.0 - 40,
                CGRectGetMaxY([label frame]) + 10,
                80, 24
             )];
</code>

<p>This line instantiates a new CPButton object, and places it 40 pixels to the left of the center of its parent view, and 10 pixels below the bottom of the label above it. It's 80 pixels wide, and 24 pixels tall. <em>CGRectMake</em> is the main way of creating a CGRect, which is the object that describes the size and positioning of every view in Cappuccino. <em>[contentView bounds]</em> returns the CGRect of <em>view</em>, but without its positioning information. <em>[label frame]</em> return the CGRect of the label, including its position information.</p>

<code>
[button setAutoresizingMask:CPViewMinXMargin | 
                            CPViewMaxXMargin | 
                            CPViewMinYMargin | 
                            CPViewMaxYMargin];
</code>

<p>Auto-resize flags define how a view resizes when it's parent resizes (all the way up to the window). In this case, it's saying that it would like to have flexible space above, below, to the right, and to the left. In other words, stay in the center, and don't change size.</p>

<code>
[button setTitle:"swap"];
</code>

<p>Set the title of the button to "swap".</p>

<code>
[button setTarget:self];
[button setAction:@selector(swap:)];                
</code>

<p>In Cappuccino, as in OpenStep and Cocoa, controls like buttons use the target/action mechanism for defining their behavior. Think of this as the equivalent to DOM elements' onclick, but much more powerful. In the code above, we're setting <strong>self</strong> (the AppController instance) to be our target, and <em>swap:</em> to be our action. This means that when the button is pressed, we'll send the <em>swap:</em> message to <strong>self</strong>, which would be equivalent to writing <em>[self swap:button]</em>. You'll notice <em>swap:</em> takes one parameter. By default, actions usually have one parameter, called <strong>sender</strong>, so that you can know who is requesting this action take place (in this case it is the button). This can provide useful context when multiple buttons or views have the same target and action.</p>

<code>
[contentView addSubview:button];
</code>

<p>Finally, in this last line, we add our button as a subview of the window's content view. The content view is the root view of a window, and so the first place you'd put any additional views.</p>

<p>As it currently stands, <strong>label</strong> is scoped to just exist within <em>applicationDidFinishLaunching:</em>, which means it won't be accessible in <em>swap:</em> or any other methods. So instead of making it a local variable, lets make it an <strong>instance variable</strong> of AppController. To do this we simply need to add it to our class declaration by replacing:</p>

<code>
@implementation AppController : CPObject
{
}
</code>

<p>with:</p>

<code class="action">
@implementation AppController : CPObject
{
    CPTextField label;
}
</code>

<p>Now, lets take out the var keyword in the original declaration of <em>label</em>.</p>

<code>
    var label = [[CPTextField alloc] initWithFrame:CGRectMakeZero()];
</code>

<p>becomes:</p>

<code class="action">
    label = [[CPTextField alloc] initWithFrame:CGRectMakeZero()];
</code>

<p>Now we need to actually add the swap method. Add the following code after the closing bracket of the <em>applicationDidFinishLaunching:</em> method:</p>

<code class="action">
- (void)swap:(id)sender
{
    if ([label stringValue] == "Hello World!")
        [label setStringValue:"Goodbye!"];
    else
        [label setStringValue:"Hello World!"];
}
</code>

<p>This code checks what the current value of <strong>label</strong> is and uses that to decide what to set the new value to.</p>

<p>Now you should be able to run this new code by saving AppController.j and hitting refresh in your browser. Click the button, and you should see the string change back and forth between "Hello World!" and "Goodbye!".</p>

<p>For a finishing touch, add this line after you create the label in <em>applicationDidFinishLaunching:</em></p>

<code class="action">
[label setAlignment:CPCenterTextAlignment];
</code>

<p>Now the text will be centered as it toggles back and forth. For the complete changes, you can download this copy of <a href="AppController.j">AppController.j</a>.</p>

<center><img src="images/new-app-completed.png" alt="finished version" /></center>

<h3>Wrapping Up</h3>
<p>This concludes our quick introduction to the Cappuccino Starter package, and to modifying your first application. Now that you've got your feet wet, you can move on to a more advanced tutorial on <a href="http://cappuccino.org/learn/tutorials/scrapbook-tutorial-1/">building a full application</a> in Cappuccino. </p>

            </div>
            
            <div style="clear: both;"></div>
        </div>
    </div>

<?php 

include('../../includes/footer.php');

?>