<?php
/**
 * Theme bootstrap and helpers.
 *
 * @package STLG
 */

declare(strict_types=1);

add_action('after_setup_theme', static function (): void {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('custom-logo', array(
        'height'      => 150,
        'width'       => 150,
        'flex-height' => true,
        'flex-width'  => true,
    ));

    register_nav_menus(array(
        'primary' => __('Navigation principale', 'stlg'),
        'footer'  => __('Navigation du pied de page', 'stlg'),
    ));
});

add_action('wp_enqueue_scripts', static function (): void {
    $theme = wp_get_theme();

    wp_enqueue_style(
        'stlg-home',
        get_stylesheet_directory_uri() . '/assets/css/site.css',
        array(),
        $theme->get('Version')
    );

    wp_enqueue_script(
        'stlg-navigation',
        get_stylesheet_directory_uri() . '/assets/js/navigation.js',
        array(),
        $theme->get('Version'),
        true
    );
});

/**
 * Render the official logo, while allowing a Custom Logo override.
 */
function stlg_site_logo(): void
{
    if (has_custom_logo()) {
        the_custom_logo();
        return;
    }

    printf(
        '<a class="stlg-logo-link" href="%1$s" rel="home"><img src="%2$s" class="stlg-logo" width="150" height="150" alt="%3$s"></a>',
        esc_url(home_url('/')),
        esc_url(get_stylesheet_directory_uri() . '/assets/images/logo-stlg.png'),
        esc_attr(get_bloginfo('name'))
    );
}

/**
 * Accessible SVG icon from the local theme sprite.
 */
function stlg_icon(string $name): string
{
    $allowed = array('target', 'users', 'trophy', 'calendar', 'link', 'pin', 'clock', 'mail', 'map', 'arrow');
    if (! in_array($name, $allowed, true)) {
        return '';
    }

    return sprintf(
        '<svg class="stlg-icon" aria-hidden="true" focusable="false"><use href="%1$s#%2$s"></use></svg>',
        esc_url(get_stylesheet_directory_uri() . '/assets/icons/sprite.svg'),
        esc_attr($name)
    );
}

/**
 * Default menu used until an administrator assigns a WordPress menu.
 */
function stlg_menu_fallback(): void
{
    $items = array(
        __('Informations', 'stlg')                    => '#club',
        __('Liens utiles', 'stlg')                    => '#pratique',
        __('Résultats de nos compétiteurs', 'stlg')   => '#resultats',
        __('Contacts', 'stlg')                        => '#contact',
        __('Ouvertures', 'stlg')                      => '#pratique',
        __('Plan', 'stlg')                            => '#plan',
    );

    echo '<ul class="stlg-menu">';
    foreach ($items as $label => $url) {
        printf('<li><a href="%1$s">%2$s</a></li>', esc_url(home_url('/') . $url), esc_html($label));
    }
    echo '</ul>';
}
