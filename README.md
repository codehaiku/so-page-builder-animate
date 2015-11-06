# SO Page Builder Animate #

Contributors: dunhakdis
Tags: Page Builder Animation, SiteOrigin Panels Animate, Page Builder by SiteOrigin Animations, dunhakdis
Requires at least: 4.1
Tested up to: 4.3
Stable tag: 0.1
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Easily add entrance animations to your "SiteOrigin Page Builder" elements or widgets.

##Description##

The SO Page Builder Animate is built for the SiteOrigin Page Builder. This plugin adds 'Animate' tab to 'Widgets Styles' inside the page builder panels. By using this plugin, you will be able to easily select from over 70+ different animation types.

##Features:##

- Select from over 70+ animations. Powered by WOW.js and Animate.css
- Ability to select animation type.
- Ability to select animation duration.
- Ability to select animation delay.
- Ability to set 'offset' value.
- Ability to set iterations for each animation.

##Note:##

If your theme already uses <a href="http://mynameismatthieu.com/WOW/">WOW.js</a> and <a href="https://daneden.github.io/animate.css/">animate.css</a> you need to 'dequeue' the following handlers in-order to prevent
conflicts:

In your theme functions.php add the following code:
```
<?php
add_action('wp_enqueue_scripts', 'dunhakdis_sbpa_remove_scripts', 100);

function dunhakdis_sbpa_remove_scripts()
{
	wp_dequeue_style('spba-animate');
	wp_dequeue_script('spba-wow');

	return;
}
?>
```
Thank you!

##Installation##

###Notice:###

This plugin is an add-on to "Page Builder by SiteOrigin". This plugin will not work if you dont have the said page builder installed and activated on your WordPress

###Manual:###

- Download and unzip the "so-page-builder-animate.zip" plugin.
- Upload the entire "so-page-builder-animate" directory to your '/wp-content/plugins/' directory.
- Activate the "SO Page Builder Animate" plugin through the Plugins menu in WordPress.
- Edit the rows or the widgets of the page builder and locate the 'Animate' tab below the 'Design' tab.
- Select animation types, durations, and etc.

###Automatic:###

Click <a href="https://codex.wordpress.org/Managing_Plugins#Automatic_Plugin_Installation" title="automatic install">here</a> to learn how to automatically add the plugin using the built-in plugin installer.


== Frequently Asked Questions ==
= Soon... =

== Screenshots ==
1. The 'Animate' settings screenshot
2. The ’Animate’ settings tab when opened

== Changelog ==
= 0.1 =
* Initial release.

== Upgrade Notice ==
= 0.1 =
Initial Release