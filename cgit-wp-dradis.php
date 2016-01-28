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

if (file_exists($_SERVER['DOCUMENT_ROOT'] . '/robots.txt')) {
    add_action('admin_notices', function() {
        echo '<div class="error"><p><strong>Warning:</strong>'
            . ' <code>robots.txt</code> detected.</p></div>';
    });
}

if (get_option('blog_public') == 0) {
    add_action('admin_notices', function() {
        echo '<div class="error"><p><strong>Warning:</strong>'
            . ' search engines are being blocked by <a href="'
            . admin_url() . 'options-reading.php">WordPress settings</a>'
            . '.</p></div>';
    });
}
