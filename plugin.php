<?php

/**
 * CC-God-User
 *
 * @package     CC-God-User
 * @author      Nikodem Jankiewicz <http://nikodemjankiewicz.pl>
 * @author      PiotrPress <http://piotr.press>
 * @copyright   2023 Clearcode
 * @license     GPL-3.0+
 *
 * @wordpress-plugin
 * Plugin Name: CC-God-User
 * Plugin URI:  https://wordpress.org/plugins/cc-god-user
 * Description: This plugin allows to add the God Users capability, block the delete option and hide specific users on the users list.
 * Version:     1.1.1
 * Author:      Clearcode
 * Author URI:  https://clearcode.cc
 * Text Domain: cc-god-user
 * Domain Path: /languages/
 * License:     GPL-3.0+
 * License URI: http://www.gnu.org/licenses/gpl-3.0.txt

	Copyright (C) 2023 by Clearcode <https://clearcode.cc> and associates
	(see AUTHORS.txt file).

	This file is part of CC-God-User.

	CC-God-User is free software; you can redistribute it and/or modify
	it under the terms of the GNU General Public License as published by
	the Free Software Foundation; either version 2 of the License, or
	(at your option) any later version.

	CC-God-User is distributed in the hope that it will be useful,
	but WITHOUT ANY WARRANTY; without even the implied warranty of
	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
	GNU General Public License for more details.

	You should have received a copy of the GNU General Public License
	along with CC-God-User; if not, write to the Free Software
	Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA 02110-1301 USA.
 */

namespace Clearcode\God_User;
use Clearcode\God_User;

defined( 'ABSPATH' ) or exit;

try {
    require __DIR__ . '/vendor/autoload.php';
	God_User::instance( __FILE__ );
} catch ( Exception $exception ) {
	if ( WP_DEBUG && WP_DEBUG_DISPLAY )
		echo $exception->getMessage();
	error_log( $exception->getMessage() );
}