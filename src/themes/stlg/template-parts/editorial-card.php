<?php
/** Card for a native WordPress post in Actualités or Résultats. @package STLG */
$editorial_category = stlg_get_editorial_category();
$category_slug = $editorial_category ? $editorial_category->slug : 'actualites';
?>
<article <?php post_class('result-card editorial-card'); ?>>
    <a href="<?php the_permalink(); ?>">
        <div class="result-card__image<?php echo has_post_thumbnail() ? '' : ' result-card__image--empty'; ?>">
            <?php if (has_post_thumbnail()) : ?>
                <?php the_post_thumbnail('large'); ?>
            <?php else : ?>
                <span class="editorial-card__monogram" aria-hidden="true">STLG</span>
                <span class="screen-reader-text"><?php esc_html_e('Publication sans image', 'stlg'); ?></span>
            <?php endif; ?>
        </div>
        <div class="result-card__body">
            <div class="editorial-card__meta">
                <?php if ($editorial_category) : ?>
                    <span class="editorial-badge editorial-badge--<?php echo esc_attr($category_slug); ?>"><?php echo esc_html($editorial_category->name); ?></span>
                <?php endif; ?>
                <time datetime="<?php echo esc_attr(get_the_date(DATE_W3C)); ?>"><?php echo esc_html(get_the_date('d/m/Y')); ?></time>
            </div>
            <h3><?php the_title(); ?></h3>
            <p><?php echo esc_html(wp_trim_words(get_the_excerpt(), 20)); ?></p>
        </div>
    </a>
</article>
