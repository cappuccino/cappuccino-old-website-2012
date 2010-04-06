=== Twitpress ===
Contributors: TomPurnell
Tags: tweet, twitter, integration
Requires at least: 2.0.2
Tested up to: 2.3.3
Stable tag: 0.3.2

Echoes user definable notification of published blog entries to twitter

== Description ==

Submits a user definable tweet to your twitter account notifying any twitter followers or friends that a new blog entry has been published on your blog (or an existing published entry has been edited). Supports inclusion of a permalink to your blog posting in the tweet.

== Installation ==

1. Upload twitpress.php to the /wp-content/plugins directory
1. Activate the plugin through the Plugins menu in Wordpress Admin (you may need to be using a wordpress administrator account for this action)
1. Please note that twitpress will create a table in your wordpress database called 'twitpress'. It will clobber any previous table with that name.
1. Fill in your twitter account information in the twitpress configuration menu found in the Manage menu in Wordpress Admin

== Upgrading ==

1. Deactive the twitpress plugin through the Plugins menu in Wordpress Admin
1. Upload twitpress.php to the /wp-content/plugins directory, overwriting the previous version
1. Fill in your twitter account information (be sure to re-enter your password), using the twitpress configuration menu found in Wordpress Admin

== Frequently Asked Questions ==

= Everything is being twittered twice! =

This was a bug that has cropped up for various people in different versions but
should really be fixed in version 0.3.2 onwards. Please let me know if this is
not the case.

= I installed twitpress and clicked activate, but my blog entries aren't being twittered! =

Unfortunately twitpress is not psychic. You need to configure your twitter 
username and password from the twitpress menu in the wordpress 'manage' menu
