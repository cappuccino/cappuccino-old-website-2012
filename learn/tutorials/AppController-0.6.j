
@import <Foundation/CPObject.j>


@implementation AppController : CPObject
{
    CPTextField label;
}

- (void)applicationDidFinishLaunching:(CPNotification)aNotification
{
    var theWindow = [[CPWindow alloc] initWithContentRect:CGRectMakeZero() styleMask:CPBorderlessBridgeWindowMask],
        contentView = [theWindow contentView];
    
    label = [[CPTextField alloc] initWithFrame:CGRectMakeZero()];
    
    [label setStringValue:@"Hello World!"];
    [label setFont:[CPFont boldSystemFontOfSize:24.0]];
    
    [label sizeToFit];
    [label setAlignment:CPCenterTextAlignment];
    
    [label setAutoresizingMask:CPViewMinXMargin | CPViewMaxXMargin | CPViewMinYMargin | CPViewMaxYMargin];
    [label setFrameOrigin:CGPointMake((CGRectGetWidth([contentView bounds]) - CGRectGetWidth([label frame])) / 2.0, (CGRectGetHeight([contentView bounds]) - CGRectGetHeight([label frame])) / 2.0)];
    
    [contentView addSubview:label];
    
    var button = [[CPButton alloc] initWithFrame:CGRectMake(CGRectGetWidth([contentView bounds])/2.0 - 40, CGRectGetMaxY([label frame]) + 10, 80, 18)];
                              
    [button setAutoresizingMask:CPViewMinXMargin | CPViewMaxXMargin | CPViewMinYMargin | CPViewMaxYMargin];

    [button setTitle:"swap"];
    
    [button setTarget:self];
    [button setAction:@selector(swap:)];                
                  
    [contentView addSubview:button];
    
    [theWindow orderFront:self];
}

- (void)swap:(id)sender
{
    if ([label stringValue] == "Hello World!")
        [label setStringValue:"Goodbye!"];
    else
        [label setStringValue:"Hello World!"];
}

@end
