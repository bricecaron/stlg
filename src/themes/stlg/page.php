<?php
/**
 * Standard page template.
 *
 * @package STLG
 */

get_header();
?>
<main id="main-content" class="internal-main">
    <div class="stlg-container content-shell">
        <?php while (have_posts()) : the_post(); ?>
            <article <?php post_class('internal-entry'); ?>>
                <h1><?php the_title(); ?></h1>
                <div class="entry-content"><?php the_content(); ?></div>
            </article>
        <?php endwhile; ?>
    </div>
</main>
<?php get_footer(); ?>
