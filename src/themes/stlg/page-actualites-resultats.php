<?php
/** Editorial index for native posts in Actualités and Résultats. @package STLG */
get_header();
$paged = max(1, (int) get_query_var('paged'), (int) get_query_var('page'));
$editorial_query = new WP_Query(array(
    'post_type' => 'post', 'post_status' => 'publish',
    'category__in' => stlg_editorial_category_ids(),
    'posts_per_page' => (int) get_option('posts_per_page', 10),
    'paged' => $paged, 'orderby' => 'date', 'order' => 'DESC',
    'ignore_sticky_posts' => true,
));
?>
<main id="main-content" class="internal-main editorial-index">
    <div class="stlg-container content-shell content-shell--wide">
        <header class="internal-heading editorial-index__heading">
            <p class="eyebrow"><?php esc_html_e('Vie du club', 'stlg'); ?></p>
            <h1><?php the_title(); ?></h1>
            <p><?php esc_html_e('Les dernières actualités du STLG et les résultats de ses compétiteurs.', 'stlg'); ?></p>
        </header>
        <?php if ($editorial_query->have_posts()) : ?>
            <div class="card-grid editorial-grid">
                <?php while ($editorial_query->have_posts()) : $editorial_query->the_post(); ?>
                    <?php get_template_part('template-parts/editorial-card'); ?>
                <?php endwhile; ?>
            </div>
            <?php $pagination = paginate_links(array('total' => $editorial_query->max_num_pages, 'current' => $paged, 'type' => 'list', 'prev_text' => __('← Précédent', 'stlg'), 'next_text' => __('Suivant →', 'stlg'))); ?>
            <?php if ($pagination) : ?>
                <nav class="editorial-pagination" aria-label="<?php esc_attr_e('Pagination des publications', 'stlg'); ?>"><?php echo wp_kses_post($pagination); ?></nav>
            <?php endif; ?>
        <?php else : ?>
            <div class="editorial-empty"><h2><?php esc_html_e('Aucune publication pour le moment', 'stlg'); ?></h2><p><?php esc_html_e('Les actualités et résultats du club seront publiés prochainement.', 'stlg'); ?></p></div>
        <?php endif; ?>
        <?php wp_reset_postdata(); ?>
    </div>
</main>
<?php get_footer(); ?>
