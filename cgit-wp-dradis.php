<?php

/*

Plugin Name: Castlegate IT WP Dradis
Plugin URI: http://github.com/castlegateit/cgit-wp-dradis
Description: Detects unwanted robots.
Version: 1.1
Author: Castlegate IT
Author URI: http://www.castlegateit.co.uk/
License: MIT

*/

if (!defined('ABSPATH')) {
    wp_die('Access denied');
}

$warn = function ($content) {
    add_action('admin_notices', function () use ($content) {
        ?>
        <div class="error">
            <p><strong>Warning:</strong> <?= $content ?></p>
        </div>
        <?php
    });
};

if (file_exists(ABSPATH . 'robots.txt')) {
    $warn('<code>robots.txt</code> detected.');
}

if (get_option('blog_public') == 0) {
    $warn('search engines blocked by <a href="' . admin_url()
        . 'options-reading.php">WordPress settings</a>.');
}

do_action('cgit_dradis_loaded');
