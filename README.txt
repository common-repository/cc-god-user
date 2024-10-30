=== CC-God-User ===
Contributors: ClearcodeHQ, nikodemjankiewicz, PiotrPress
Tags: user, admin, superadmin, goduser, god, users, wp-admin, hide, Nikodem Jankiewicz, PiotrPress, Piwik PRO, Clearcode
Requires PHP: 7.0
Requires at least: 4.9.8
Tested up to: 6.1.1
Stable tag: trunk
License: GPLv3
License URI: http://www.gnu.org/licenses/gpl-3.0.txt

This plugin allows to add the God Users capability, block the delete option and hide specific users on the users list.

== Description ==

This plugin allows to add God Users capability, block the delete option and hide specific users on the users list. Only God Users can see other God Users or grant God capability to regular administrators.
The user who activates the plugin is the first God User. An Administrator with the God Capability can then add the capability to other regular Administrators through their user profile.
To prevent other users from deactivating and/or deleting the plugin by other users, use it as [Must Use Plugin](https://codex.wordpress.org/Must_Use_Plugins) by moving the plugin directory into `wp-content/mu-plugins`. In that case don't forget to create some [Autoloader](https://codex.wordpress.org/Must_Use_Plugins#Autoloader_Example) according to WordPress codex documentation or use some plugin e.g. [CC-MU-Plugins-Loader](https://wordpress.org/plugins/cc-mu-plugins-loader/) to automatic load the plugin.

== Installation ==

= From your WordPress Dashboard =

1. Go to 'Plugins > Add New'
2. Search for 'CC-God-User'
3. Activate the plugin from the Plugin section on your WordPress Dashboard.

= From WordPress.org =

1. Download 'CC-God-User'.
2. Upload the 'cc-god-user' directory to your '/wp-content/plugins/' directory using your favorite method (ftp, sftp, scp, etc...)
3. Activate the plugin from the Plugin section in your WordPress Dashboard.

To prevent other users from deactivating and/or deleting the plugin by other users, use it as [Must Use Plugin](https://codex.wordpress.org/Must_Use_Plugins) by moving the plugin directory into `wp-content/mu-plugins`. In that case don't forget to create some [Autoloader](https://codex.wordpress.org/Must_Use_Plugins#Autoloader_Example) according to WordPress codex documentation or use some plugin e.g. [CC-MU-Plugins-Loader](https://wordpress.org/plugins/cc-mu-plugins-loader/) to automatic load the plugin.

= Once Activated =

1. The user who activates the plugin is the first God User.
2. An Administrator with the God Capability can then add the capability to other regular Administrators through their user profile.

== Screenshots ==

1. **User Profile** - Set 'God User' capability to selected administrators.
2. **Users List** - Only 'God Users' can see other 'God Users' on Users List.

== Changelog ==

= 1.1.1 =
* Release date: 06.03.2023*

* Fixed WP_User_Query incorrectly call.

= 1.1.0 =
* Release date: 11.03.2022*

* Fixed Multisite support.

= 1.0.0 =
* Release date: 16.08.2018*

* First stable version of the plugin.