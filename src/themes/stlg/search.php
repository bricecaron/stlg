<?php
/**
 * Search results template.
 *
 * @package STLG
 */

get_header();
?>
<main id="main-content" class="internal-main">
    <div class="stlg-container content-shell">
        <header class="internal-heading">
            <h1><?php printf(esc_html__('Résultats pour « %s »', 'stlg'), esc_html(get_search_query())); ?></h1>
        </header>
        <?php if (have_posts()) : ?>
            <div class="internal-list">
                <?php while (have_posts()) : the_post(); ?>
                    <article <?php post_class('internal-card'); ?>>
                        <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                        <?php the_excerpt(); ?>
                    </article>
                <?php endwhile; ?>
            </div>
            <?php the_posts_pagination(); ?>
        <?php else : ?>
            <p><?php esc_html_e('Aucun résultat ne correspond à votre recherche.', 'stlg'); ?></p>
        <?php endif; ?>
    </div>
</main>
<?php get_footer(); ?>
