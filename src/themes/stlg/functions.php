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
    $parent_stylesheet_path = get_template_directory() . '/style.css';
    $child_stylesheet_path  = get_stylesheet_directory() . '/style.css';
    $site_stylesheet_path   = get_stylesheet_directory() . '/assets/css/site.css';
    $navigation_script_path = get_stylesheet_directory() . '/assets/js/navigation.js';

    wp_enqueue_style(
        'twentytwentyfive-style',
        get_template_directory_uri() . '/style.css',
        array(),
        is_file($parent_stylesheet_path) ? (string) filemtime($parent_stylesheet_path) : $theme->get('Version')
    );

    wp_enqueue_style(
        'stlg-style',
        get_stylesheet_uri(),
        array('twentytwentyfive-style'),
        is_file($child_stylesheet_path) ? (string) filemtime($child_stylesheet_path) : $theme->get('Version')
    );

    wp_enqueue_style(
        'stlg-home',
        get_stylesheet_directory_uri() . '/assets/css/site.css',
        array('stlg-style'),
        is_file($site_stylesheet_path) ? (string) filemtime($site_stylesheet_path) : $theme->get('Version')
    );

    wp_enqueue_script(
        'stlg-navigation',
        get_stylesheet_directory_uri() . '/assets/js/navigation.js',
        array(),
        is_file($navigation_script_path) ? (string) filemtime($navigation_script_path) : $theme->get('Version'),
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
        __('Le club', 'stlg')                 => '/le-club/',
        __('Disciplines', 'stlg')              => '/disciplines/',
        __('École de tir', 'stlg')             => '/ecole-de-tir/',
        __('Actualités & résultats', 'stlg')   => '/actualites-resultats/',
        __('Infos pratiques', 'stlg')          => '/infos-pratiques/',
        __('Contact', 'stlg')                  => '/contact/',
    );

    echo '<ul class="stlg-menu">';
    foreach ($items as $label => $url) {
        printf('<li><a href="%1$s">%2$s</a></li>', esc_url(home_url($url)), esc_html($label));
    }
    echo '</ul>';
}

/** @return int[] IDs of the native editorial categories. */
function stlg_editorial_category_ids(): array
{
    $ids = array();
    foreach (array('actualites', 'resultats') as $slug) {
        $category = get_category_by_slug($slug);
        if ($category) {
            $ids[] = (int) $category->term_id;
        }
    }
    return $ids;
}

/** Return the first relevant editorial category assigned to a post. */
function stlg_get_editorial_category(int $post_id = 0): ?WP_Term
{
    $terms = get_the_category($post_id ?: (int) get_the_ID());
    foreach (array('actualites', 'resultats') as $slug) {
        foreach ($terms as $term) {
            if ($slug === $term->slug) {
                return $term;
            }
        }
    }
    return null;
}
