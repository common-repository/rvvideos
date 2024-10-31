=== Plugin Name ===
Contributors: axeloz
Tags: restovisio, restaurant, videos
Requires at least: 3.*
Tested up to: 4.0
Stable tag: 1.9.2

This plugin automatically converts RestoVisio video URLs into an embed video player

== Description ==

This plugin automatically converts RestoVisio video URLs into an embed video player. It's very convenient and easy to use, editor just needs to copy and paste a RestoVisio URL into the post [http://www.restovisio.com/restaurant/xxxxx-ID.htm] for instance and the video player (flash or html5 depending on the device) will appear. Make sure you use the brackets otherwise the URL will remain unchanged.
The plugin does not alter your post content! It triggers on display therefore if you uninstall it your posts remain unchanged!

== Installation ==

1. Upload `rvvideos.php` to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress

== Screenshots ==

1. The video player is automatically displayed into the post
2. Player size may be changed on the plugin options page 

== Changelog ==

= 1.9.2 =
* Bugfix on Regexp

= 1.9.1 =
* Pushing new version

= 1.9 = 
* Now supports moroccan and canadian websites
* Now requires brackets [ ] to work

= 1.8 =
* Now uses new RestoVisio embed URLs
* Now compatible with # in URLs

= 1.7 =
* Bugfix: using __() instead of _()

= 1.6 =
* Using a separate JS file
* Starting Internationalization
* Minor changes (cleaning and bugfixes)

= 1.5 =
* Adding validation to the form
* Improved UI + helper messages
* Bugfix when computing the ratio

= 1.4 =
* Bugfix: height was set to 0 when saving

= 1.3 =
* Adding feature to keep player aspect ratio according to width

= 1.2 =
* Bugfix: width and height were not taken into account

= 1.1 =
* Adding options Width and Height
* Adding an admin page to manage options

= 1.0 =
* First stable version working
