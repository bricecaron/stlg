<?php
/**
 * Bootstrap du theme enfant STLG.
 *
 * @package STLG
 */

declare(strict_types=1);

add_action(
    'wp_enqueue_scripts',
    static function (): void {
        wp_enqueue_style(
            'stlg-style',
            get_stylesheet_uri(),
            array(),
            wp_get_theme()->get('Version')
        );
    }
);
