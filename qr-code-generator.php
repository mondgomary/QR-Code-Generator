<?php
/*
Plugin Name: QR Code Generator
Description: Vygeneruje QR kódy cez shortcode.
Version: 1.0
Author: Mondgomary
*/

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// Načítanie shortcodu
require_once plugin_dir_path(__FILE__) . 'includes/settings-page.php';
require_once plugin_dir_path(__FILE__) . 'includes/qr-shortcode.php';
