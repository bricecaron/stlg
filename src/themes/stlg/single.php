<?php
/**
 * Single post template.
 *
 * @package STLG
 */

get_header();
?>
<main id="main-content" class="internal-main">
    <div class="stlg-container content-shell">
        <?php while (have_posts()) : the_post(); ?>
            <article <?php post_class('internal-entry'); ?>>
                <p class="entry-meta"><?php echo esc_html(get_the_date()); ?></p>
                <h1><?php the_title(); ?></h1>
                <?php if (has_post_thumbnail()) : ?>
                    <div class="entry-thumbnail"><?php the_post_thumbnail('large'); ?></div>
                <?php endif; ?>
                <div class="entry-content"><?php the_content(); ?></div>
            </article>
        <?php endwhile; ?>
    </div>
</main>
<?php get_footer(); ?>
