<?php

/**
 * Plugin Name: Simple Social Share
 * Description: Share you pages and blog posts on social media
 * Version: 1.0.0
 */


namespace IgniteOnline\Plugins;

use IgniteOnline\SocialShare\GlobalSettings;

require_once 'vendor/autoload.php';

if (version_compare(PHP_VERSION, '5.6', '<')) {
    exit(sprintf('Google Tag Manager requires PHP 5.6 or higher. You’re still on %s.', PHP_VERSION));
}

add_action('admin_menu', function () {
    add_menu_page('Social Share', 'Social Share', 'manage_options', 'ignite-social-share', __NAMESPACE__ . '\\social_admin_page', 'data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZpZXdCb3g9IjAgMCAyNC40OCA5MS44MiI+PHRpdGxlPkFzc2V0IDE8L3RpdGxlPjxnIGlkPSJMYXllcl8yIiBkYXRhLW5hbWU9IkxheWVyIDIiPjxnIGlkPSJMYXllcl8xLTIiIGRhdGEtbmFtZT0iTGF5ZXIgMSI+PHBvbHlnb24gcG9pbnRzPSIyNC40OCA0OC45IDI0LjI3IDQ4LjgyIDEuMTUgMCA3LjEyIDQyLjk5IDAgNDIuOTkgMjMuMTIgOTEuODIgMTcuMSA0OC45IDI0LjMxIDQ4LjkgMjQuNDggNDguOSIgZmlsbD0iIzBmOSIvPjwvZz48L2c+PC9zdmc+');
});

add_action('admin_print_styles', function () {
    ?>
    <style>
        #toplevel_page_ignite-social-share .wp-menu-image {
            background-size: contain !important;
        }
    </style>
    <?php
});

function social_admin_page()
{
    include 'templates/options.php';
}

add_action('after_setup_theme', function () {
    new GlobalSettings();
});
