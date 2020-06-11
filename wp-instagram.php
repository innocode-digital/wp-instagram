<?php
/**
 * Plugin Name: Instagram
 * Description: Enables Instagram API for developers.
 * Version: 1.1.0
 * Author: Innocode
 * Author URI: https://innocode.com
 * Requires at least: 4.9
 * Tested up to: 5.4.2
 * License: GPLv2 or later
 * License URI: http://www.gnu.org/licenses/gpl-2.0.html
 */

use Innocode\Instagram;

define( 'INNOCODE_INSTAGRAM', 'innocode_instagram' );

if ( file_exists( __DIR__ . '/vendor/autoload.php' ) ) {
    require_once __DIR__ . '/vendor/autoload.php';
}

if ( defined( 'INSTAGRAM_CLIENT_ID' ) && defined( 'INSTAGRAM_CLIENT_SECRET' ) ) {
    $GLOBALS['innocode_instagram'] = new Instagram\Plugin( __DIR__ );
    $GLOBALS['innocode_instagram']->run();
}

if ( ! function_exists( 'innocode_instagram' ) ) {
    /**
     * @return \MetzWeb\Instagram\Instagram
     */
    function innocode_instagram() {
        /**
         * @var Instagram\Plugin $innocode_instagram
         */
        global $innocode_instagram;

        if ( is_null( $innocode_instagram ) ) {
            trigger_error(
                'Missing required constants INSTAGRAM_CLIENT_ID and INSTAGRAM_CLIENT_SECRET.',
                E_USER_ERROR
            );
        }

        return $innocode_instagram->get_instagram();
    }
}
