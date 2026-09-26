<?php
/**
 * Not found template.
 *
 * @package STLG
 */

get_header();
?>
<main id="main-content" class="internal-main">
    <div class="stlg-container content-shell content-shell--centered">
        <p class="eyebrow"><?php esc_html_e('Erreur 404', 'stlg'); ?></p>
        <h1><?php esc_html_e('Cette page est introuvable.', 'stlg'); ?></h1>
        <p><?php esc_html_e('La page demandée a peut-être été déplacée ou supprimée.', 'stlg'); ?></p>
        <a class="button" href="<?php echo esc_url(home_url('/')); ?>"><?php esc_html_e('Retour à l’accueil', 'stlg'); ?> <span aria-hidden="true">→</span></a>
    </div>
</main>
<?php get_footer(); ?>
