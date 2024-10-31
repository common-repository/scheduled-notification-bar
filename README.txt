=== Plugin Name ===
Contributors: (this should be a list of wordpress.org userid's), freemius
Donate link: https://wizplugins.com
Tags: Notification bar, notices, message bar, timer bar, schedule bar, header message, footer message
Requires at least: 4.5
Tested up to: 5.7.2
Stable tag: 1.0.1
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Schedule notification bars to run between specific dates

== Description ==

With Scheduled Notification Bar you can set and schedule notification bars between dates on your website. Use it to coincide with special sale events, promotions and deals.

The free version of Scheduled Notification Bar allows you to:

* Schedule 1 Scheduled Notification Bar at a time
* Schedule a start date in a similar way that you can schedule a post
* Set an end date to unpublish the Scheduled Notification Bar
* Set your own message
* Set the colours for the bar and text
* Add a button
* Set the position to top or bottom
* Set it to be sticky on scroll or relative

**The pro version has added features:**

* Schedule multiple Scheduled Notification Bars at once
* Set an expired time

This will allow you to plan sale events on autopilot. If a sale ends at 2am, you can go to bed and it will end automatically.

**Addons**

There are currently 3 addons available:

* Countdown timer
* Custom HTML or shortcode
* Mailchimp integration

View purchase options here  [Scheduled Notification Bar](https://wizplugins.com/product/scheduled-notification-bar/ "Scheduled Notification Bar")


== Installation ==

This section describes how to install the plugin and get it working.

1. Head to add new plugin and Search Scheduled Notification Bar 
2. Click install
3. Click activate
4. Head to add new notification bar

1. Upload `scheduled-notification-bar.zip to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Head to add new notification bar

== Frequently Asked Questions ==

= The notification bar ended but is still visible =

Ensure that your cache plugin purges on a post or custom post type publishing or unpublishing event.

= The notification bar didn't end =

The notification bar schdule runs on cron. You will need visitors to trigger an event. As a visitor visits your site the cron will fire (once every 5 minutes) which will unpublish the Scheduled Notification Bar and make it invisible to visitors.

== Screenshots ==

1. This screen shot description corresponds to screenshot-1.(png|jpg|jpeg|gif). Note that the screenshot is taken from
the /assets directory or the directory that contains the stable readme.txt (tags or trunk). Screenshots in the /assets
directory take precedence. For example, `/assets/screenshot-1.png` would win over `/tags/4.3/screenshot-1.png`
(or jpg, jpeg, gif).
2. This is the second screen shot

== Changelog ==
= 1.0.1 =
* Undefined index error fix
* Changed handling of number of bars 

= 1.0 =
* Initial launch

== Upgrade Notice ==
= 1.0.1 =
Undefined index error fix
Changed handling of number of bars 

= 1.0 =
Initial launch
