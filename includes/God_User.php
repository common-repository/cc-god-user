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

namespace Clearcode;

use Clearcode\God_User\Vendor\Clearcode\Framework\v3\Plugin;
use Clearcode\God_User\Table;
use Clearcode\God_User\Profile;

if ( ! defined( 'ABSPATH' ) ) exit;
if ( ! class_exists( __NAMESPACE__ . '\God_User' ) ) {
    class God_User extends Plugin {

        const ROLE       = 'administrator';
        const CAPABILITY = 'god';

        public function activation()   {
            if ( self::count_gods() ) return;

            $user = wp_get_current_user();
            $user->add_cap( self::CAPABILITY );
        }

        public function deactivation() {}

        protected function __construct( $file ) {
            self::count_gods();
            parent::__construct( $file );

            Table::instance();
            Profile::instance();
        }

        static public function count_gods() {
            static $count = 0;
            if ( $count ) return $count;

            $count_users = count_users( [ 'role' => 'god' ] );
            $count       = $count_users['avail_roles']['god'] ?? 0;
        }

        static public function is_god() {
            if ( ! $current_user = wp_get_current_user() ) return false;
            return ( isset( $current_user->caps[ self::ROLE ] ) && isset( $current_user->caps[ self::CAPABILITY ] ) );
        }

        public function action_pre_user_query( $query ) {
            if ( ! self::is_god() ) {
                global $wpdb;
                $query->query_where = str_replace(
                    "WHERE 1=1",
                    "WHERE 1=1 AND {$wpdb->users}.ID IN (
						SELECT {$wpdb->usermeta}.user_id FROM $wpdb->usermeta
						WHERE {$wpdb->usermeta}.meta_key = '{$wpdb->prefix}capabilities'
						AND {$wpdb->usermeta}.meta_value NOT LIKE '%" . self::CAPABILITY . "%')",
                    $query->query_where
                );
            }
            return $query;
        }
    }
}