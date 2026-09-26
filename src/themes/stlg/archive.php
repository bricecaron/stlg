<?php
/**
 * Archive template.
 *
 * @package STLG
 */

get_header();
?>
<main id="main-content" class="internal-main">
    <div class="stlg-container content-shell">
        <header class="internal-heading">
            <?php the_archive_title('<h1>', '</h1>'); ?>
            <?php the_archive_description('<div class="archive-description">', '</div>'); ?>
        </header>
        <?php if (have_posts()) : ?>
            <div class="internal-list">
                <?php while (have_posts()) : the_post(); ?>
                    <article <?php post_class('internal-card'); ?>>
                        <p class="entry-meta"><?php echo esc_html(get_the_date()); ?></p>
                        <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                        <?php the_excerpt(); ?>
                    </article>
                <?php endwhile; ?>
            </div>
            <?php the_posts_pagination(); ?>
        <?php else : ?>
            <p><?php esc_html_e('Aucun contenu publié pour le moment.', 'stlg'); ?></p>
        <?php endif; ?>
    </div>
</main>
<?php get_footer(); ?>
