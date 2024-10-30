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
use Clearcode\God_User;

use Clearcode\God_User\Vendor\Clearcode\Framework\v3\Singleton;
use Clearcode\God_User\Vendor\Clearcode\Framework\v3\Filterer;

if ( ! defined( 'ABSPATH' ) ) exit;
if ( ! defined( __NAMESPACE__ . '\Table' ) ) {
	class Table {
		use Singleton;

		protected function __construct() {
			new Filterer( $this );
		}

		protected function link( $role, $label, $count ) {
			return God_User::render( 'link', [
				'url'  => sprintf( 'users.php?role=%s', $role ),
				'link' => $label . ' ' . God_User::render( 'span', [
					'content' => sprintf( '(%s)', $count ),
					'class'   => 'count'
			] ) ] );
		}

		protected function hide_gods( $view ) {
			return preg_replace_callback( '/\d+/', function( $matches ) {
				return $matches[0] - God_User::count_gods();
			}, $view );
		}

		public function filter_views_users( $views ) {
			if ( God_User::is_god() )
				$views[ God_User::CAPABILITY ] = $this->link( God_User::CAPABILITY, God_User::__( 'God User' ), God_User::count_gods() );
			else foreach( [ 'all', 'administrator' ] as $role )
				$views[ $role ] = $this->hide_gods( $views[ $role ] );

			return $views;
		}

		public function filter_get_role_list( $role, $user ) {
			if ( array_key_exists( God_User::ROLE, $role ) and isset( $user->caps[ God_User::CAPABILITY ] ) )
				$role[ God_User::ROLE ] = God_User::__( 'God User' );
			return $role;
		}
	}
}
