<?php

$active = "Learn";
$title = "Objective-J Tutorial"; 

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
            
                <h1>Learning Objective-J</h1>
            
<p>Objective-J is a new programming language based on Objective-C. It is a superset of JavaScript, which means that any valid JavaScript code is also valid Objective-J code. Anyone familiar with JavaScript and object-oriented programming concepts, classical inheritance in particular, should have no difficulty learning Objective-J. Familiarity with Objective-C will be helpful, but it is not required.</p>

<h2>Classes</h2>

<p>Objective-J has two types of objects, native JavaScript objects and Objective-J objects. Native JS objects are exactly what they sound like, the objects native to JavaScript. Objective-J objects are a special type of native object added by Objective-J. These new objects are based on classes and classical inheritance, like C++ or Java, instead of the prototypal model.</p>

<p>Creating a class in Objective-J is simple. Here's an example of a Person class that contains one member variable, name:</p>

<code>
@implementation Person : CPObject
{
    CPString name;
}

@end
</code>

<p>The beginning of a class is always the keyword @implementation, followed by the class name. The third term, after the colon, is the class you want to subclass. In this case, we're subclassing CPObject, which is the root class for most classes. You don't need a superclass, but nearly all the time you will want one.</p>

<p>After the declaration, a block enclosed with brackets is used to define all your member variables. Each variable is declared on its own line with a type and variable name, and a semicolon. Technically the type is optional, but its highly recommended. Declaring your member variables is important, because any variable used elsewhere in your class that isn't declared will automatically become a global variable.</p>

<p>To end a class declaration, add the keyword @end.</p>

<h2>Methods</h2>

<p>Just as with objects, native JavaScript functions work unchanged in Objective-J. In addition to native functions, Objective-J adds methods which are part of the new class system. Let's add a set of accessor methods to our Person class:</p>

<code>
- (void)setName:(CPString)aName
{
    name = aName;
}

- (CPString)name
{
    return name;
}
</code>

<p>These lines go anywhere after the initial @implementation line and instance variable declaration block, but before the @end keyword. This syntax should be familiar to anyone who's programmed a C style language before, including JavaScript. The only interesting thing is the method declaration.</p>

<p>Each method signature starts with either a dash (-) or a plus (+). Dashes are used for instance methods, which are methods you can call on instance variables. Both of our methods above are instance methods, which makes sense because they set and retrieve instance variables of our Person objects.</p>

<p>Following the dash/plus is a return type, in parentheses. Nothing special about this. Again, type declarations are optional but highly recommended, as they help document your code. Finally, we declare the method name. In Objective-J, method parameters are interspersed within the method name. Our two methods above are name, and setName:. Note the colon after "setName"; it indicated that a parameter follows.</p>

<p>When methods have more than one parameter, each parameter is separated by a colon. In the declaration of such a method, parameters are split by a label, followed by a colon, the type, and the parameter name:</p>

<code>
- (void)setJobTitle:(CPString)aJobTitle company:(CPString)aCompany
</code>

<p>In Objective-J, method names are split across all of the arguments to a method. These are not technically named arguments. The method above is named setJobTitle:company:. This is achieved by concatenating the first part of the method with all the subsequent labels, in order.</p>

<p>The parameters to a method must be passed in order, and all of the parameters are required. To call such a multiple parameter method, we pass our data after each label:</p>

<code>
[myPerson setJobTitle:"Founder" company:"280 North"];
</code>

<p>As you can see, each colon is followed by the input that will be mapped to that parameter name. That sequence of label, colon, input is repeated for each parameter.</p>

<p>You may be wondering why it matters what the actual name of the method is. One pattern you'll find in Objective-J and Cappuccino is the idea of passing a method as an argument to another method. This is used commonly in delegation and in the event system. Since methods aren't first class objects in the same way as JavaScript, we use a special notation to refer to them, @selector. If I wanted to pass the previous method as an argument to another method, I would use the following code:</p>

<code>
[fooObject setCallbackSelector:@selector(setJobTitle:company:)];
</code>

<p>As you can see, the method name is passed to @selector complete with its colons and parameter labels.</p>

<h2>Using Objects &amp; Classes</h2>

<p>Now that we've covered the basics Objective-J objects and classes, let's see how you use them. This block of code creates a new Person object, and sets the name:</p>

<code>
var myPerson = [[Person alloc] init];
[myPerson setName:"John"];
</code>

<p>Method calls in Objective-J are called "messages", and you send an object a message using bracket notation like this: [object message]. I mentioned earlier that some methods are class methods, which are meant to be called on a class itself -- alloc is one of these methods. Every class in Objective-J has a special class method called alloc, which returns a new instance of that class.</p>

<p>In the example above, we're calling the alloc method on the Person class, which returns a Person instance. Then, we call the init method on that instance. Both alloc and init return a reference to the object, which we can assign our variable myPerson. Just like alloc, every class inherits the init method from CPObject.</p>

<p>The alloc class method is analogous to the "new" keyword in many languages like JavaScript, C++, and Java, in that they create a new instance. The init instance methods are like the constructors in those languages, in that they perform initialization on the newly created instance.</p>

<p>Some classes specify their own custom init method, like CPView, which uses the following signature:</p>

<code>
- (id)initWithFrame:(CGRect)aFrame
</code>

<p>Every subclass should be sure to call its parent class init method. Here's a custom init method for our Person class which takes the name directly:</p>

<code>
- (id)initWithName:(CPString)aName
{
    self = [super init];
    if (self)
    {
        name = aName;
    }
    return self;
}
</code>

<p>First we call our superclass init method, which returns a reference to the newly initialized instance. We must assign this reference to the "self" variable (in case the super class's init method swapped out the original instance for a new one). We check to make sure self was returned correctly, and if so we can do our class specific task of assigning aName to name, and finally, we return self so that calling code will have a reference to the newly initialized object.</p>

<p>"self" is the Objective-J equivalent to JavaScript's "this". Just as "this" references the JavaScript object, "self" references the Objective-J object. Like JavaScript, self.foo will refer to the foo instance variable, but unlike JavaScript self isn't required, you can just use foo within any instance methods.</p>

<p>Many classes in Cappuccino offer a slightly different model for creating objects, which can be more convenient. Instead of calling alloc and init, these classes implement their own class method to return new objects. Note that in class methods, self refers to the class itself.</p>

<code>
+ (id)personWithName:(CPString)aName
{
    return [[self alloc] initWithName:aName];
}
</code>


<p>Which would be called like this:</p>

<code>
var joe = [Person personWithName:"Joe"];
</code>


<h2>Importing Code</h2>

<p>One commonly desired technique missing from JavaScript is the ability to import code in the same way that languages like Java or C allow. To that effect, Objective-J adds the @import statement:</p>

<code>
@import &lt;Foundation/CPObject.j&gt;
@import &lt;AppKit/CPView.j&gt;
@import "MyClass.j"
</code>

<p>There are two types of import statements. The angle brackets indicate framework code, while the quotation marks indicate local project code. Framework imports use the built in search path mechanism to search for the desired file in any of the defined locations. Local imports only look in the location relative to the importing file.</p>

<h2>Memory Management</h2>

<p>JavaScript is garbage collected, and so is Objective-J, so you won't see any calls to retain or release in Objective-J code as you would in Objective-C. Many common leaks caused by DOM manipulation are handled by the Cappuccino frameworks.</p>

<p>That isn't to say it's impossible to leak objects. As with any garbage collected language, it's possible to accidentally hold on to reference to objects such that they can't be freed, so keep this in mind.</p>

<h2>Categories</h2>

<p>Categories allow you to add methods to a class without needing to create a new subclass or modify the class's source code. The new method (or methods) become part of all instances of the class once the category is loaded.</p>

<p>This is useful in many different scenarios, for example adding methods to built-in classes. If you wanted all your CPString objects to have a method that would return the reverse string, you could define a category like this:</p>

<code>
@import &lt;Foundation/CPString.j&gt;

@implementation CPString (Reversing)

- (CPString)reverse
{
    var reversedString = "",
        index = [self length];
        
    while(index--)
        reversedString += [self characterAtIndex:index];
        
    return reversedString;
}

@end
</code>

<p>Now you can call reverse on any string to get the reversed string.</p>

<code>
var myString = "hello world";
var reversed = [myString reverse];
alert(reversed);  // alerts "dlrow olleh"
</code>

<p>The syntax for the category is @implementation, followed by the class you're adding to, followed by the name of your category in parentheses. Any methods added before the @end keyword will be part of the category. Note that you can't add instance variables via categories, though due to the dynamic nature of JavaScript objects it's possible to add one by simply modifying the object's properties directly:</p>

<code>
instance.newProperty = "foo";
</code>

<p>It's interesting to note some of the techniques used in the implementation of the reverse method above. For example, reversedString is declared just like any typical JavaScript string. This is thanks to a technique called toll-free bridging which allows any JavaScript object like an array or a string to act both as a JavaScript object and a Cappuccino object at the same time. It responds to CPString methods like "length" and "characterAtIndex:", as well as existing JavaScript methods and operators such as "+".</p>

<h2>Scope</h2>

<p>Most of the time, Objective-J has the same scoping rules as JavaScript. Variables not specifically declared with var become globals, while var'd variables have function/method level scope. The two changes to these rules are instance variables and file-scoped variables.</p>

<p>Instances variables are declared in the @implementation block, as seen earlier in the tutorial. When you use those variables within your class, they have object level scope -- they are not global, they belong to each instance object. If you forget to declare one of your instance variables, however, then it is treated as a global variable like any other JavaScript code.</p>

<p>File-scoped variables are something introduced in Objective-J. When you declare a variable with the var keyword outside a function or method implementation, these variables (sometimes called statics) have file level scope. They can only be accessed by other code within the same file. This can be useful for implementing many shared object techniques without needing to resort to global variables. If a file contains a single class they can be thought of as "class variables".</p>

<p>The following is an example of the main scoping rules in Objective-J:</p>

<code>
globalScoped = "this becomes global";
var fileScoped = "this stays scoped in the file";

@implementation Foo : CPObject
{
    CPString objectScoped;
}

- (void)baz
{
    var methodScoped;
    
    methodScoped = "function scope, declared with var";
    anotherGlobal = "global scope, no var";
    objectScoped = "still object scoped";
    fileScoped = "still file scoped";
}

@end
</code>

<h2>Wrapping Up</h2>

<p>This concludes our basic overview of Objective-J. The language is a simple and straightforward addition to JavaScript, and most developers shouldn't have any trouble becoming familiar with it.</p>
                            
<p>If you'd like to see the complete code listing from the tutorial, you can download it all in a single file: <a href="Person.j">Person.j</a>.</p>                            
            </div>
            
            <div style="clear: both;"></div>
        </div>
    </div>

<?php 

include('../../includes/footer.php');

?>