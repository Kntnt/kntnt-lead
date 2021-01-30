<?php

/**
 * Plugin main file.
 *
 * @wordpress-plugin
 * Plugin Name:       Kntnt Lead
 * Plugin URI:        https://github.com/Kntnt/kntnt-lead
 * GitHub Plugin URI: https://github.com/Kntnt/kntnt-lead
 * Description:       Adds lead to selectable types of posts, and also makes lead default for empty excerpts.
 * Version:           1.0.0
 * Author:            Thomas Barregren
 * Author URI:        https://www.kntnt.com/
 * License:           GPL-3.0+
 * License URI:       http://www.gnu.org/licenses/gpl-3.0.txt
 * Requires PHP:      7.1
 */


namespace Kntnt\Lead;

// Uncomment following line to debug this plugin.
 define( 'KNTNT_LEAD_DEBUG', true );

require 'autoload.php';

defined( 'WPINC' ) && new Plugin;