<?php

/*

Plugin Name: Castlegate IT WP Dradis
Plugin URI: http://github.com/castlegateit/cgit-wp-obfuscator
Description: Detects unwanted robots.
Version: 1.0
Author: Castlegate IT
Author URI: http://www.castlegateit.co.uk/
License: MIT

*/

function cgit_wp_dradis_contact () {
    echo '<div class="error"><p>Warning: <code>robots.txt</code> detected.</p></div>';
}

if ( file_exists( $_SERVER['DOCUMENT_ROOT'] . '/robots.txt' ) ) {
    add_action('admin_notices', 'cgit_wp_dradis_contact');
}
