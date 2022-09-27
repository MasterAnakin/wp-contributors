<?php
/**
 *Plugin Name:  Contributors plugin
 *Description:  Allows user to add coauthors
 *Plugin URI:   https://mmilosevic.com
 *Author:       Milos Milosevic
 *Version:      1.0
 *Text Domain:  contributors
 *Domain Path:  /languages
 *License:      GPL v2 or later
 *License URI:  https://www.gnu.org/licenses/gpl-2.0.txt
*/


/**
 * Register a meta box using a class.
 */

include "includes/class-custom-meta.php";
include "includes/class-show-contributors-after-content.php";

