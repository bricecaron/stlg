<?php
/**
 * Site footer.
 *
 * @package STLG
 */
?>
<footer class="site-footer" id="contact">
    <div class="site-footer__inner stlg-container">
        <div class="footer-identity">
            <img src="<?php echo esc_url(get_stylesheet_directory_uri() . '/assets/images/logo-stlg.png'); ?>" width="82" height="82" alt="">
            <address>
                <strong><?php esc_html_e('Société de Tir de Livry-Gargan (STLG)', 'stlg'); ?></strong><br>
                6 rue du Docteur Herpin<br>
                93190 Livry-Gargan<br>
                <a href="tel:+33180904588">Tél : 01 80 90 45 88</a>
            </address>
        </div>
        <nav class="footer-navigation" aria-label="<?php esc_attr_e('Navigation de pied de page', 'stlg'); ?>">
            <?php
            wp_nav_menu(array(
                'theme_location' => 'footer',
                'container'      => false,
                'menu_class'     => 'stlg-menu footer-menu',
                'fallback_cb'    => 'stlg_menu_fallback',
                'depth'          => 1,
            ));
            ?>
        </nav>
    </div>
</footer>
<?php wp_footer(); ?>
</body>
</html>
