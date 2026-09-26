<?php
/**
 * STLG homepage.
 *
 * @package STLG
 */

get_header();

$theme_uri = get_stylesheet_directory_uri();
$quick_links = array(
    array('Le club', 'target', home_url('/le-club/')),
    array('Disciplines', 'target', home_url('/disciplines/')),
    array('École de tir', 'users', home_url('/ecole-de-tir/')),
    array('Résultats', 'trophy', home_url('/actualites-resultats/')),
    array('Horaires', 'calendar', home_url('/infos-pratiques/#horaires')),
    array('Nous trouver', 'pin', home_url('/infos-pratiques/#acces')),
);
?>
<main id="main-content">
    <section class="hero" aria-labelledby="hero-title">
        <div class="hero__image" aria-hidden="true"></div>
        <div class="hero__overlay" aria-hidden="true"></div>
        <div class="hero__content stlg-container">
            <h1 id="hero-title">Société de Tir<br>de Livry-Gargan</h1>
            <span class="yellow-rule" aria-hidden="true"></span>
            <p>Un club de tir sportif ouvert à toutes et à tous,<br>alliant passion, rigueur et convivialité.</p>
        </div>
    </section>

    <nav class="quick-nav stlg-container" aria-label="<?php esc_attr_e('Accès rapides', 'stlg'); ?>">
        <?php foreach ($quick_links as $index => $link) : ?>
            <a class="quick-nav__item<?php echo 0 === $index ? ' is-featured' : ''; ?>" href="<?php echo esc_url($link[2]); ?>">
                <?php echo stlg_icon($link[1]); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
                <span><?php echo esc_html($link[0]); ?></span>
                <?php echo stlg_icon('arrow'); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
            </a>
        <?php endforeach; ?>
    </nav>

    <section class="intro" id="club">
        <div class="intro__inner stlg-container">
            <div class="intro__content">
                <p class="eyebrow">Bienvenue au STLG</p>
                <span class="yellow-rule" aria-hidden="true"></span>
                <h2>Le tir sportif<br>à Livry-Gargan</h2>
                <p>Que vous soyez débutant ou tireur confirmé, le STLG vous accompagne dans la découverte et la progression du tir sportif, dans un cadre sécurisé, avec des installations adaptées.</p>
                <a class="button" href="<?php echo esc_url(home_url('/le-club/')); ?>">Découvrir le club <span aria-hidden="true">→</span></a>
            </div>
            <div class="intro__visual placeholder-visual" role="img" aria-label="Photographie du pas de tir à venir">
                <img src="<?php echo esc_url($theme_uri . '/assets/images/range-placeholder.svg'); ?>" alt="" width="800" height="520">
                <span>Photographie du club à venir</span>
            </div>
        </div>
    </section>

    <section class="disciplines section" id="disciplines">
        <div class="stlg-container">
            <div class="section-heading"><h2>Nos disciplines</h2><span class="yellow-rule" aria-hidden="true"></span></div>
            <div class="discipline-grid">
                <article><span class="discipline-symbol" aria-hidden="true">◎</span><h3>10 m</h3><p>Pistolet</p></article>
                <article><span class="discipline-symbol" aria-hidden="true">◁</span><h3>25 m</h3><p>Pistolet &amp; Carabine</p></article>
                <article><span class="discipline-symbol" aria-hidden="true">◇</span><h3>30 m</h3><p>Arbalète</p></article>
                <article><span class="discipline-symbol" aria-hidden="true">▷</span><h3>50 m</h3><p>Pistolet &amp; Carabine</p></article>
            </div>
        </div>
    </section>

    <section class="results section" id="resultats">
        <div class="stlg-container">
            <div class="section-heading section-heading--row">
                <div><h2>Actualités &amp; résultats</h2><span class="yellow-rule" aria-hidden="true"></span></div>
                <a class="text-link" href="<?php echo esc_url(home_url('/actualites-resultats/')); ?>">Toutes les actualités &amp; résultats <span aria-hidden="true">→</span></a>
            </div>
            <div class="card-grid">
                <?php
                $editorial_posts = new WP_Query(array(
                    'post_type'           => 'post',
                    'post_status'         => 'publish',
                    'posts_per_page'      => 3,
                    'category__in'        => stlg_editorial_category_ids(),
                    'orderby'             => 'date',
                    'order'               => 'DESC',
                    'ignore_sticky_posts' => true,
                ));
                if ($editorial_posts->have_posts()) :
                    while ($editorial_posts->have_posts()) :
                        $editorial_posts->the_post();
                        ?>
                        <?php get_template_part('template-parts/editorial-card'); ?>
                        <?php
                    endwhile;
                    wp_reset_postdata();
                else :
                    ?>
                    <div class="editorial-empty editorial-empty--home">
                        <p><?php esc_html_e('Les actualités et résultats du club seront publiés prochainement.', 'stlg'); ?></p>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <section class="practical" id="pratique" aria-labelledby="practical-title">
        <h2 id="practical-title" class="screen-reader-text">Informations pratiques</h2>
        <div class="practical__inner stlg-container">
            <a href="<?php echo esc_url(home_url('/infos-pratiques/#horaires')); ?>"><?php echo stlg_icon('clock'); // phpcs:ignore ?><span><strong>Horaires</strong><small>Consulter les horaires →</small></span></a>
            <a href="<?php echo esc_url(home_url('/contact/')); ?>"><?php echo stlg_icon('mail'); // phpcs:ignore ?><span><strong>Contact</strong><small>Une question ? →</small></span></a>
            <a href="<?php echo esc_url(home_url('/infos-pratiques/#acces')); ?>"><?php echo stlg_icon('pin'); // phpcs:ignore ?><span><strong>Nous trouver</strong><small>Parc des sports Alfred Vincent →</small></span></a>
            <div class="map-placeholder" id="plan"><img src="<?php echo esc_url($theme_uri . '/assets/images/map-placeholder.svg'); ?>" alt="Plan schématique de Livry-Gargan" width="360" height="130"><a class="button button--blue" href="<?php echo esc_url(home_url('/infos-pratiques/#acces')); ?>">Voir le plan <span aria-hidden="true">→</span></a></div>
        </div>
    </section>
</main>
<?php get_footer(); ?>
