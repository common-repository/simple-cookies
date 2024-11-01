=== Simple Cookies ===
Contributors: azhary, mortrall
Tags: cookies, simple, marketing, content
Requires at least: 4.7.0
Tested up to: 6.4.2
Stable tag: 1.0.8
Requires PHP: 5.6
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Allows you to implement the functionality of dynamic content at your website.

== Description ==

Allows you to implement the functionality of dynamic content and progressive profiling on the site and work with cookies for those marketers who are not a web developer.

# ShortCodes
* [addsimplecookie] — params: parameter, value, time.
* [showforsimplecookie] content [/showforsimplecookie] — params: parameter, value.
* [hideforsimplecookie] content [/hideforsimplecookie] — params: parameter, value.
* [removesimplecookie] — params: parameter, value.

= Features =
* Simple & Intuitive

= Links =
* [Documentation](https://karpov.expert/simple-cookies/)

== Installation ==

From your WordPress dashboard

1. **Visit** Plugins > Add New
2. **Search** for "Simple Cookies"
3. **Activate** Simple Cookies from your Plugins page
4. **Click** on the editor item "Simple Cookies" and create your first Simple Cookies Shortcode!
5. **Read** the documentation at https://karpov.expert/simple-cookies/


== Frequently Asked Questions ==

= How many cookies can I use? =

You can use [addsimplecookie] any amount of times per page, but you should remember, that browsers do have restrictions. If you want to support most browsers, then don't exceed 50 cookies per domain, and don't exceed 4093 bytes per domain (i.e. total size of all cookies <= 4093 bytes).

= What if user will use Incognito mode in browser? =

Then all cookies will be deleted after the session will be closed. So you will not be able to track previous visits, but during the current session, all shortcodes will be working.

== Screenshots ==

1. banner-772x250.jpg
2. icon-128x128.png

== Changelog ==

= 1.0.3 =
* Fixed add/delete widgets bug - 28 March 2020

= 1.0.2 =
* Fixed bug - 28 March 2020

= 1.0.1 =
* Fixed bug - 7 November 2019

= 1.0.0 =
* Release Date - 28 September 2019

== Upgrade Notice ==

= 1.0.1 =
Fixed bug with proper use of "value" parameter in [showforsimplecookie] and [hideforsimplecookie] shortcodes.

= 1.0.0 =
No upgrades by far.
