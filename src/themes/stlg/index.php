<?php
/**
 * Fallback template.
 *
 * @package STLG
 */

get_header();
?>
<main id="main-content" class="internal-main">
    <div class="stlg-container content-shell">
        <?php if (have_posts()) : ?>
            <div class="internal-list">
                <?php while (have_posts()) : the_post(); ?>
                    <article <?php post_class('internal-card'); ?>>
                        <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                        <?php the_excerpt(); ?>
                    </article>
                <?php endwhile; ?>
            </div>
        <?php else : ?>
            <h1><?php esc_html_e('Aucun contenu disponible.', 'stlg'); ?></h1>
        <?php endif; ?>
    </div>
</main>
<?php get_footer(); ?>
