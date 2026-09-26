<?php
/**
 * STLG homepage.
 *
 * @package STLG
 */

get_header();

$theme_uri = get_stylesheet_directory_uri();
$quick_links = array(
    array('Le club', 'target', '#club'),
    array('Les disciplines', 'users', '#disciplines'),
    array('Nos résultats', 'trophy', '#resultats'),
    array('Ouvertures', 'calendar', '#pratique'),
    array('Liens utiles', 'link', '#pratique'),
    array("Plan d’accès", 'pin', '#plan'),
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
                <a class="button" href="#disciplines">Découvrir le club <span aria-hidden="true">→</span></a>
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
                <a class="text-link" href="<?php echo esc_url(get_category_link(get_cat_ID('Résultats'))); ?>">Voir tous les résultats <span aria-hidden="true">→</span></a>
            </div>
            <div class="card-grid">
                <?php
                $results = new WP_Query(array('posts_per_page' => 3, 'category_name' => 'resultats', 'ignore_sticky_posts' => true));
                if ($results->have_posts()) :
                    while ($results->have_posts()) :
                        $results->the_post();
                        ?>
                        <article class="result-card">
                            <a href="<?php the_permalink(); ?>">
                                <div class="result-card__image">
                                    <?php if (has_post_thumbnail()) : the_post_thumbnail('large'); else : ?>
                                        <img src="<?php echo esc_url($theme_uri . '/assets/images/result-placeholder.svg'); ?>" alt="" width="640" height="360">
                                    <?php endif; ?>
                                </div>
                                <div class="result-card__body"><p class="card-meta"><?php echo esc_html(get_the_date()); ?></p><h3><?php the_title(); ?></h3><p><?php echo esc_html(wp_trim_words(get_the_excerpt(), 12)); ?></p></div>
                            </a>
                        </article>
                        <?php
                    endwhile;
                    wp_reset_postdata();
                else :
                    $fallbacks = array(
                        array('Résultats sportifs', 'Les prochains résultats seront publiés ici.'),
                        array('Vie du club', 'Retrouvez bientôt les actualités du STLG.'),
                        array('Compétitions', 'Suivez les compétiteurs de Livry-Gargan.'),
                    );
                    foreach ($fallbacks as $fallback) :
                        ?>
                        <article class="result-card result-card--placeholder">
                            <div class="result-card__image"><img src="<?php echo esc_url($theme_uri . '/assets/images/result-placeholder.svg'); ?>" alt="" width="640" height="360"></div>
                            <div class="result-card__body"><p class="card-meta">À venir</p><h3><?php echo esc_html($fallback[0]); ?></h3><p><?php echo esc_html($fallback[1]); ?></p></div>
                        </article>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <section class="practical" id="pratique" aria-labelledby="practical-title">
        <h2 id="practical-title" class="screen-reader-text">Informations pratiques</h2>
        <div class="practical__inner stlg-container">
            <a href="#pratique"><?php echo stlg_icon('clock'); // phpcs:ignore ?><span><strong>Horaires</strong><small>Consulter les horaires →</small></span></a>
            <a href="#contact"><?php echo stlg_icon('mail'); // phpcs:ignore ?><span><strong>Contact</strong><small>Une question ? →</small></span></a>
            <a href="#plan"><?php echo stlg_icon('pin'); // phpcs:ignore ?><span><strong>Nous trouver</strong><small>Parc des sports Alfred Vincent →</small></span></a>
            <div class="map-placeholder" id="plan"><img src="<?php echo esc_url($theme_uri . '/assets/images/map-placeholder.svg'); ?>" alt="Plan schématique de Livry-Gargan" width="360" height="130"><a class="button button--blue" href="#plan">Voir le plan <span aria-hidden="true">→</span></a></div>
        </div>
    </section>
</main>
<?php get_footer(); ?>
