<?php
/*
Plugin Name: Shortcode Shows All Images
Description: Creates a Shortcode to display all Images that have been uploaded
Author: Bego Mario Garde
Author URI: https://garde-medienberatung.de
Version: 0.1.0
License: GPL2
Text Domain: pix-all-images
Domain Path: languages
*/

/*

    Copyright (C) 2015  Bego Mario Garde  <pixolin@gmx.com>

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

// Don't allow direct access to this file
if ( ! defined( 'ABSPATH' ) ) exit;

define( 'SSAI_PATH', plugin_dir_path(__FILE__) );

// Prepare for i18n
load_plugin_textdomain('ssai', false, basename( dirname( __FILE__ ) ) . '/languages' );

// Require file with main class
require SSAI_PATH . 'ssai-class.php';

// Run Class
$ssai = new SSAI_class();

// Be happy.