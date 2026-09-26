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
            <?php $editorial_category = stlg_get_editorial_category(); ?>
            <article <?php post_class('internal-entry'); ?>>
                <div class="single-editorial__meta">
                    <?php if ($editorial_category) : ?>
                        <span class="editorial-badge editorial-badge--<?php echo esc_attr($editorial_category->slug); ?>"><?php echo esc_html($editorial_category->name); ?></span>
                    <?php endif; ?>
                    <time datetime="<?php echo esc_attr(get_the_date(DATE_W3C)); ?>"><?php echo esc_html(get_the_date('d/m/Y')); ?></time>
                </div>
                <h1><?php the_title(); ?></h1>
                <?php if (has_post_thumbnail()) : ?>
                    <div class="entry-thumbnail"><?php the_post_thumbnail('large'); ?></div>
                <?php endif; ?>
                <div class="entry-content"><?php the_content(); ?></div>
                <?php if ($editorial_category) : ?>
                    <p class="single-editorial__back"><a href="<?php echo esc_url(home_url('/actualites-resultats/')); ?>">← <?php esc_html_e('Retour aux actualités & résultats', 'stlg'); ?></a></p>
                <?php endif; ?>
            </article>
        <?php endwhile; ?>
    </div>
</main>
<?php get_footer(); ?>
