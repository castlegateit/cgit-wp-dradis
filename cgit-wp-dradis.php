<?php

/*

Plugin Name: Castlegate IT WP Dradis
Plugin URI: http://github.com/castlegateit/cgit-wp-dradis
Description: Detects unwanted robots.
Version: 1.0
Author: Castlegate IT
Author URI: http://www.castlegateit.co.uk/
License: MIT

*/

function cgit_wp_dradis_contact () {
    echo '<div class="error"><p>Warning: <code>robots.txt</code> detected.</p></div>';
}

function cgit_wp_dradis_block () {
    $admin = admin_url();
    echo "<div class='error'><p>Warning: search engines are being blocked by <a href='{$admin}options-reading.php'>WordPress settings</a>.</p></div>";
}

if ( file_exists( $_SERVER['DOCUMENT_ROOT'] . '/robots.txt' ) ) {
    add_action('admin_notices', 'cgit_wp_dradis_contact');
}

if ( get_option('blog_public') == 0 ) {
    add_action('admin_notices', 'cgit_wp_dradis_block');
}
