=== SimpleTwitter ===
Contributors: sleepydisco 
Tags: twitter,simple,simpletwitter,rss,badge,feed
Requires at least: 2.0.5
Tested up to: 2.0.5
Stable tag: 1.1

SimpleTwitter displays the most recent twitter post (tweet) for a given user. The tweet 
is cached on the webserver for a number of minutes.

== Description ==

SimpleTwitter allows Wordpress blog owners to add Twitter messages to their templates. 
Once installed, the plug-in is used by adding the following call in a template.

`<?php get_twitter_msg(); ?>`

There's no formatting. All this returns is the plain text that is the most recent 
Twitter post found for the configured Twitter user. The message will be cached for the 
configured number of minutes. After this time, Twitter is checked for new messages.

All configuration is done through wp-admin. No code editing is necessary.

= A note about cURL =

SimpleTwitter uses the cURL php libraries to make requests to twitter.com. If cURL is
not available this will be indicated in the wp-admin interface will, and the 
`get_twitter_msg()` function will return nothing. This should degrade gracefully, so you 
should not experience php errors.

== Installation ==

1. Upload `simple_twitter.php` to the `/wp-content/plugins/` directory
2. Activate the plugin though the `Plugins' menu in WordPress wp-admin
3. Configure the plugin through the `Options -> SimpleTwitter' menu in WordPress wp-admin:
3a. Add a twitter user id for the messages you want to show
3b. Specify a time in minutes, for how long the SimpleTwitter should cache the tweet
4. Place `<?php get_twitter_msg(); ?>` where you would like the message to appear 

== Frequently Asked Questions ==

= What is my twitter user id? =

Your twitter user id is the user name that you used to sign up to twitter. 

= Can I use any twitter id? =

Yes. Anything that resolves to http://twitter.com/twitter_id/ can be used.

= Why not just use the Javascript badge? =

The javascript badge makes a call to twitter.com *every* time a page is requested. SimpleTwitter 
caches the tweet for a few minutes, so your web pages should be complete faster.

= I've just posted to twitter. Why isn't my tweet showing? =

This will be because of the cache. This will always be a compromise between instantly updating 
your website with the most recent message, and always serving a complete webpage to your visitors.

= Why does my web page occasionally takes a long time to load? =

SimpleTwitter runs before a page has finished loading. If the cache has expired, a 
request to twitter.com will be made. Depending on how busy twitter.com is, it may 
take a while to respond. There is a fairly small time out set in the plugin, which should
restrict the time it waits for a response to an acceptable level. If twitter.com hasn't responed
in this time, the cache will not update and the old message will be displayed. Remember, it should
only have to do this after the number of minutes configured in wp-admin.

= How long is the length of the time out? =

A connection has to be made to twitter.com within 4 seconds. A response has to be received within
8 seconds.

= Can I change the length of the request time out? =

Not yet, no.

= How do I show the time of the tweet? =

You can't just yet. This isn't called SimpleTwitter for nothing!

== Screenshots ==

Sorry! No screenshots as yet.
