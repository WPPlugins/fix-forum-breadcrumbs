=== Fix Forum Breadcrumbs ===
Contributors: fliz, kona
Tags: bbpress, breadcrumbs, forum breadcrumbs
Requires at least: 3.9
Tested up to: 4.8
Stable tag: 1.0
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Removes duplicate root breadcrumb in bbPress forum breadcrumbs. 

== Description ==

If your bbPress forum page is also your front page, your bbPress forum breadcrumbs may include the forum main page twice.  (The first breadcrumb is a link to the site front page, and the second breadcrumb is a link to the forum main page - but these pages both show the main forum archive.)

This plugin removes the second breadcrumb entry.

If a problem with duplicate breadcrumbs persists, your theme may be affecting the bbPress breadcrumb settings; you'll need to look into that separately, or try a different theme.

== Installation ==

1. Install this plugin via the WordPress plugin control panel, or by manually downloading it and uploading the extracted folder to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. That's all! There are no configurable options for this plugin.

== Frequently Asked Questions ==

= I'm still seeing a duplicate root breadcrumb even though I've enabled the plugin. =

Your theme may be changing the forum breadcrumb settings.  Check your theme code, or try a different theme.

== Screenshots ==

1. Forum showing duplicated root breadcrumb issue.

2. Forum breadcrumbs as fixed by this plugin.

== Changelog ==

= 1.0 =
* Initial version

== Upgrade Notice ==

= 1.0 =
Initial version.
