<?php
/*
 * Plugin Name: Custom WP Admin Login
 * Plugin URI: #
 * Description: Custom WP Admin Login plugin allows you to easily customize your admin login page according to your needs.
 * Author: Anshul Labs
 * Author URI: http://anshullabs.xyz
 * Version: 1.0
 * Text Domain: custom-wp-admin-login
 * License: GPL2
 * License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/

/*
Copyright 2012  Anshul Labs  (email : hello@anshullabs.xyz)

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License, version 2, as
published by the Free Software Foundation.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/


/*
|---------------------------------------------------------------------------------------------------
| Define Custom variables 
|---------------------------------------------------------------------------------------------------
*/
define('CWPAL_VERSION', '1.0');
define('CWPAL_FILE', basename(__FILE__));
define('CWPAL_NAME', str_replace('.php', '', CWPAL_FILE));
define('CWPAL_PATH', plugin_dir_path(__FILE__));
define('CWPAL_URL', plugin_dir_url(__FILE__));
define('CWPAL_TEXTDOMAIN', 'custom-wp-admin-login' );


/*
|---------------------------------------------------------------------------------------------------
| Include ReduxCore Framework
|---------------------------------------------------------------------------------------------------
*/
if ( !class_exists( 'ReduxFramework' ) && file_exists( dirname( __FILE__ ) . '/admin/lib/ReduxCore/framework.php' ) ) {
    require_once( dirname( __FILE__ ) . '/admin/lib/ReduxCore/framework.php' );
}


/*
|---------------------------------------------------------------------------------------------------
| Include Admin Settings
|---------------------------------------------------------------------------------------------------
*/
if ( !isset( $redux_demo ) && file_exists( dirname( __FILE__ ) . '/admin/lib/plugin-config.php' ) ) {
    require_once( dirname( __FILE__ ) . '/admin/admin-settings.php' );
}


/*
|---------------------------------------------------------------------------------------------------
| Include apply css file for admin login page.
|---------------------------------------------------------------------------------------------------
*/
require_once( dirname( __FILE__ ) . '/admin/apply-css.php' );