<?php

/*
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

defined( 'ABSPATH' ) or exit;
defined( 'WP_UNINSTALL_PLUGIN' ) or exit;

function get_gods() {
	return get_users( [
		'role__in' => 'god'
	] );
}

function remove_gods() {
	if ( ! $gods = get_gods() ) return false;

	foreach( $gods as $god )
		$god->remove_cap( 'god' );

	return true;
}

return remove_gods();