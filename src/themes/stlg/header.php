<?php
/**
 * Site header.
 *
 * @package STLG
 */
?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<a class="skip-link" href="#main-content"><?php esc_html_e('Aller au contenu', 'stlg'); ?></a>
<header class="site-header">
    <div class="site-header__inner stlg-container">
        <div class="site-branding"><?php stlg_site_logo(); ?></div>
        <button class="menu-toggle" type="button" aria-expanded="false" aria-controls="primary-navigation">
            <span class="menu-toggle__label"><?php esc_html_e('Menu', 'stlg'); ?></span>
            <span class="menu-toggle__bars" aria-hidden="true"><span></span><span></span><span></span></span>
        </button>
        <nav id="primary-navigation" class="primary-navigation" aria-label="<?php esc_attr_e('Navigation principale', 'stlg'); ?>">
            <?php
            wp_nav_menu(array(
                'theme_location' => 'primary',
                'container'      => false,
                'menu_class'     => 'stlg-menu',
                'fallback_cb'    => 'stlg_menu_fallback',
                'depth'          => 1,
            ));
            ?>
        </nav>
    </div>
</header>
