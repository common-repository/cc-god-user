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
use WP_User;

if ( ! defined( 'ABSPATH' ) ) exit;
if ( ! defined( __NAMESPACE__ . '\Profile' ) ) {
	class Profile {
		use Singleton;

		protected function __construct() {
			new Filterer( $this );
		}

		public function action_edit_user_profile( $user ) {
			if ( God_User::is_god() && isset( $user->caps[ God_User::ROLE ] ) )
				echo God_User::render( 'profile', [
					'title'       => God_User::__( 'God User' ),
					'description' => sprintf( God_User::__( 'Set this user as: %s' ), God_User::render( 'code', [
						'content' => God_User::__( 'God User' )
					] ) ),
					'checked'     => checked( isset( $user->caps[ God_User::CAPABILITY ] ), true, false ),
					'id'          => God_User::CAPABILITY,
					'name'        => God_User::CAPABILITY
				] );
		}

		public function action_profile_update( $user_id ) {
			if ( ! $user = new WP_User( $user_id ) )  return;
			if ( ! isset( $user->caps[ God_User::ROLE ] ) ) return;
			if ( God_User::is_god() )
				isset( $_POST[ God_User::CAPABILITY ] )
                    ? $user->add_cap( God_User::CAPABILITY )
                    : $user->remove_cap( God_User::CAPABILITY );
		}

		public function action_edit_user_profile_update( $user_id ) {
			if ( ! $user = new WP_User( $user_id ) ) return;
			if ( isset( $user->caps[ God_User::CAPABILITY ] ) && ! God_User::is_god() )
				wp_die( God_User::__( 'Cheatin&#8217; uh?' ) );
		}
	}
}
