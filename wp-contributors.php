<?php
/**
 *Plugin Name:  Contributors plugin
 *Description:  Allows user to add contributors to posts
 *Plugin URI:   https://mmilosevic.com
 *Author:       Milos Milosevic
 *Version:      1.0
 *Text Domain:  contributors
 *Domain Path:  /languages
 *License:      GPL v2 or later
 *License URI:  https://www.gnu.org/licenses/gpl-2.0.txt
*/

include_once "includes/class-contributors-custom-meta.php";
include_once "includes/class-show-contributors-after-content.php";

function my_enqueued_assets() {
    wp_enqueue_style( 'wp-contributors-css', plugin_dir_url(__FILE__) . '/public/css/style.css', '' );
}
add_action('wp_enqueue_scripts', 'my_enqueued_assets');