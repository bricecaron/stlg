<?php
/**
 * Issue #3 content migration.
 *
 * Run from the repository root:
 * docker compose --profile tools run --rm cli wp eval-file wp-content/stlg-tools/migrate-lot-3a.php
 */
if (! defined('WP_CLI') || ! WP_CLI) {
    exit("Run this file with WP-CLI.\n");
}

$pages = array(
    'le-club' => <<<'HTML'
<!-- wp:paragraph {"className":"stlg-lead"} --><p class="stlg-lead">La Société de Tir de Livry-Gargan accueille ses adhérents au sein du parc des sports Alfred Vincent, à Livry-Gargan.</p><!-- /wp:paragraph -->
<!-- wp:heading --><h2 class="wp-block-heading">Les installations du club</h2><!-- /wp:heading -->
<!-- wp:paragraph --><p>Le STLG dispose d’installations dédiées au tir à 10 m, 25 m, 30 m et 50 m.</p><!-- /wp:paragraph -->
<!-- wp:group {"className":"stlg-summary-grid"} --><div class="wp-block-group stlg-summary-grid">
<!-- wp:group {"className":"stlg-summary-card"} --><div class="wp-block-group stlg-summary-card"><!-- wp:heading {"level":3} --><h3>10 m</h3><!-- /wp:heading --><!-- wp:paragraph --><p>9 postes, dont un poste transformable pour l’arbalète 10 m.</p><!-- /wp:paragraph --></div><!-- /wp:group -->
<!-- wp:group {"className":"stlg-summary-card"} --><div class="wp-block-group stlg-summary-card"><!-- wp:heading {"level":3} --><h3>25 m</h3><!-- /wp:heading --><!-- wp:paragraph --><p>Un stand loisir et un stand compétition. Trois postes du stand loisir sont réservés à la poudre noire.</p><!-- /wp:paragraph --></div><!-- /wp:group -->
<!-- wp:group {"className":"stlg-summary-card"} --><div class="wp-block-group stlg-summary-card"><!-- wp:heading {"level":3} --><h3>30 m</h3><!-- /wp:heading --><!-- wp:paragraph --><p>5 postes d’arbalète 30 m, transformables en postes pistolet 50 m.</p><!-- /wp:paragraph --></div><!-- /wp:group -->
<!-- wp:group {"className":"stlg-summary-card"} --><div class="wp-block-group stlg-summary-card"><!-- wp:heading {"level":3} --><h3>50 m</h3><!-- /wp:heading --><!-- wp:paragraph --><p>12 postes, dont la moitié équipée d’une table de bench-rest, et un poste avec gongs à 50 m.</p><!-- /wp:paragraph --></div><!-- /wp:group -->
</div><!-- /wp:group -->
<!-- wp:paragraph {"className":"stlg-page-link"} --><p class="stlg-page-link"><a href="/disciplines/">Consulter le détail des disciplines et des conditions d’accès aux installations</a></p><!-- /wp:paragraph -->
HTML,
    'disciplines' => <<<'HTML'
<!-- wp:paragraph {"className":"stlg-lead"} --><p class="stlg-lead">Les installations du STLG permettent la pratique à 10 m, 25 m, 30 m et 50 m. Les informations ci-dessous reprennent les usages et conditions explicitement publiés par le club.</p><!-- /wp:paragraph -->
<!-- wp:group {"className":"stlg-discipline-section"} --><div class="wp-block-group stlg-discipline-section"><!-- wp:heading --><h2>10 m</h2><!-- /wp:heading --><!-- wp:paragraph --><p>Le pas de tir comprend <strong>9 postes</strong>, dont un poste transformable pour l’arbalète 10 m.</p><!-- /wp:paragraph --></div><!-- /wp:group -->
<!-- wp:group {"className":"stlg-discipline-section"} --><div class="wp-block-group stlg-discipline-section"><!-- wp:heading --><h2>25 m</h2><!-- /wp:heading --><!-- wp:heading {"level":3} --><h3>Stand loisir</h3><!-- /wp:heading --><!-- wp:paragraph --><p>Les calibres autorisés vont du .22 au .45 ACP, avec les chargements préconisés par le club. Les balles manufacturées ne sont pas autorisées, à l’exception du .22 LR. Trois postes sont réservés à la poudre noire, avec les charges préconisées par le club.</p><!-- /wp:paragraph --><!-- wp:heading {"level":3} --><h3>Stand compétition</h3><!-- /wp:heading --><!-- wp:paragraph --><p>Ce stand est réservé aux tireurs inscrits aux compétitions officielles dans les disciplines 25 m ISSF et TAR. L’accès reste effectif tant que le tireur s’inscrit et participe à ces épreuves.</p><!-- /wp:paragraph --></div><!-- /wp:group -->
<!-- wp:group {"className":"stlg-discipline-section"} --><div class="wp-block-group stlg-discipline-section"><!-- wp:heading --><h2>30 m</h2><!-- /wp:heading --><!-- wp:paragraph --><p>Le club dispose de <strong>5 postes d’arbalète 30 m</strong>, transformables en postes pistolet 50 m.</p><!-- /wp:paragraph --></div><!-- /wp:group -->
<!-- wp:group {"className":"stlg-discipline-section"} --><div class="wp-block-group stlg-discipline-section"><!-- wp:heading --><h2>50 m</h2><!-- /wp:heading --><!-- wp:paragraph --><p>Le pas de tir comprend <strong>12 postes à 50 m</strong>. La moitié est équipée d’une table de bench-rest. Un poste comporte des gongs à 50 m. Le calibre autorisé est le .22 LR.</p><!-- /wp:paragraph --></div><!-- /wp:group -->
HTML,
    'infos-pratiques' => <<<'HTML'
<!-- wp:paragraph {"className":"stlg-lead"} --><p class="stlg-lead">Retrouvez les horaires d’ouverture, les jours de fermeture, l’accès au stand et les organismes de référence du tir sportif.</p><!-- /wp:paragraph -->
<!-- wp:group {"anchor":"horaires","className":"stlg-anchor-section"} --><div id="horaires" class="wp-block-group stlg-anchor-section"><!-- wp:heading --><h2>Horaires</h2><!-- /wp:heading --><!-- wp:paragraph {"className":"stlg-notice stlg-notice--important"} --><p class="stlg-notice stlg-notice--important"><strong>La fin des tirs intervient 15 minutes avant la fermeture.</strong></p><!-- /wp:paragraph -->
<!-- wp:table {"className":"is-style-stripes stlg-hours-table"} --><figure class="wp-block-table is-style-stripes stlg-hours-table"><table><thead><tr><th>Période</th><th>Lundi, mercredi et samedi</th><th>Dimanche</th></tr></thead><tbody><tr><td><strong>Été</strong><br>1er avril–30 septembre</td><td>9 h–12 h<br>14 h–18 h</td><td>9 h 30–12 h<br>14 h–18 h</td></tr><tr><td><strong>Hiver</strong><br>1er octobre–31 mars</td><td>9 h–12 h<br>14 h–17 h</td><td>9 h 30–12 h<br>14 h–17 h</td></tr></tbody></table></figure><!-- /wp:table -->
<!-- wp:heading {"level":3} --><h3>Jours fériés de fermeture</h3><!-- /wp:heading --><!-- wp:list --><ul><li>1er janvier</li><li>1er mai</li><li>14 juillet</li><li>1er novembre</li><li>25 décembre</li></ul><!-- /wp:list -->
<!-- wp:group {"className":"stlg-notice"} --><div class="wp-block-group stlg-notice"><!-- wp:heading {"level":3} --><h3>Modifications ponctuelles</h3><!-- /wp:heading --><!-- wp:paragraph --><p>Ces horaires peuvent être modifiés ponctuellement, notamment pour l’accès au stand loisir 25 m lorsqu’il est utilisé pour la formation des polices municipales. Certaines installations peuvent aussi être indisponibles lors de championnats. Les informations ponctuelles sont publiées sur la page d’accueil.</p><!-- /wp:paragraph --></div><!-- /wp:group --></div><!-- /wp:group -->
<!-- wp:group {"anchor":"acces","className":"stlg-anchor-section"} --><div id="acces" class="wp-block-group stlg-anchor-section"><!-- wp:heading --><h2>Accès</h2><!-- /wp:heading --><!-- wp:columns {"className":"stlg-contact-grid"} --><div class="wp-block-columns stlg-contact-grid"><!-- wp:column --><div class="wp-block-column"><!-- wp:heading {"level":3} --><h3>Adresse</h3><!-- /wp:heading --><!-- wp:paragraph --><p><strong>Société de Tir de Livry-Gargan (STLG)</strong><br>6 rue du Docteur Herpin<br>93190 Livry-Gargan</p><!-- /wp:paragraph --><!-- wp:paragraph --><p>Le stand se trouve <strong>face au Tennis Club</strong>, dans le parc des sports Alfred Vincent.</p><!-- /wp:paragraph --></div><!-- /wp:column --><!-- wp:column --><div class="wp-block-column"><!-- wp:heading {"level":3} --><h3>Localisation</h3><!-- /wp:heading --><!-- wp:paragraph --><p><a href="https://www.google.fr/maps/@48.9184126,2.5435464,17z">Ouvrir la localisation dans Google Maps</a></p><!-- /wp:paragraph --></div><!-- /wp:column --></div><!-- /wp:columns --></div><!-- /wp:group -->
<!-- wp:group {"anchor":"liens-utiles","className":"stlg-anchor-section"} --><div id="liens-utiles" class="wp-block-group stlg-anchor-section"><!-- wp:heading --><h2>Liens utiles</h2><!-- /wp:heading --><!-- wp:list {"className":"stlg-link-list"} --><ul class="stlg-link-list"><li><a href="https://www.fftir.org/">Fédération Française de Tir</a></li><li><a href="https://ligue.idf-tir.org/">Ligue Île-de-France de Tir</a></li><li><a href="https://www.cdtir93.fr/">Comité départemental de Tir du 93</a></li></ul><!-- /wp:list --></div><!-- /wp:group -->
HTML,
    'contact' => <<<'HTML'
<!-- wp:paragraph {"className":"stlg-lead"} --><p class="stlg-lead">Pour obtenir rapidement un renseignement, le club recommande de privilégier le courrier électronique.</p><!-- /wp:paragraph -->
<!-- wp:columns {"className":"stlg-contact-grid"} --><div class="wp-block-columns stlg-contact-grid"><!-- wp:column --><div class="wp-block-column"><!-- wp:heading --><h2>Coordonnées du club</h2><!-- /wp:heading --><!-- wp:paragraph --><p><strong>Société de Tir de Livry-Gargan (STLG)</strong><br>6 rue du Docteur Herpin<br>93190 Livry-Gargan</p><!-- /wp:paragraph --><!-- wp:paragraph --><p><strong>Téléphone :</strong> <a href="tel:+33180904588">01 80 90 45 88</a><br><strong>Courriel :</strong> <a href="mailto:93stlg@gmail.com">93stlg@gmail.com</a></p><!-- /wp:paragraph --><!-- wp:paragraph {"className":"stlg-notice"} --><p class="stlg-notice">Le téléphone est accessible uniquement pendant les heures d’ouverture du stand et lorsqu’un permanent est présent.</p><!-- /wp:paragraph --></div><!-- /wp:column --><!-- wp:column --><div class="wp-block-column"><!-- wp:heading --><h2>Bureau</h2><!-- /wp:heading --><!-- wp:list {"className":"stlg-role-list"} --><ul class="stlg-role-list"><li><strong>Président :</strong> Claude Peyrebere — <a href="mailto:julien.peyrebere@orange.fr">julien.peyrebere@orange.fr</a></li><li><strong>Vice-président :</strong> Lambert Ducoutumany — <a href="mailto:l.ducoutumany@sfr.fr">l.ducoutumany@sfr.fr</a></li><li><strong>Trésorier :</strong> Jacques Cheron</li><li><strong>Secrétaire général :</strong> Daniel Beslier</li><li><strong>Secrétaire administrative :</strong> Isabelle Hideux</li></ul><!-- /wp:list --></div><!-- /wp:column --></div><!-- /wp:columns -->
<!-- wp:heading --><h2>Équipe pédagogique</h2><!-- /wp:heading --><!-- wp:list {"className":"stlg-role-list"} --><ul class="stlg-role-list"><li><strong>Lambert Ducoutumany</strong> — certificat professionnel de moniteur de tir ; école de tir le samedi de 14 h à 21 h ; formation préalable aux armes de poing de gros calibre. <a href="mailto:l.ducoutumany@sfr.fr">l.ducoutumany@sfr.fr</a> — <a href="tel:+33623512295">06 23 51 22 95</a></li><li><strong>Claude Peyrebere</strong> — lundi, 17 h 30–20 h</li><li><strong>Georges Collet</strong> — mercredi, 14 h–19 h</li><li><strong>Joel Magnier</strong> — vendredi, 20 h–21 h</li></ul><!-- /wp:list -->
<!-- wp:heading --><h2>Référents des disciplines</h2><!-- /wp:heading --><!-- wp:list {"className":"stlg-role-list"} --><ul class="stlg-role-list"><li><strong>Armes anciennes :</strong> Daniel Beslier et Lambert Ducoutumany</li><li><strong>TAR et 25 m :</strong> Lambert Ducoutumany</li><li><strong>50 m :</strong> Claude Peyrebere, Joel Magnier, Lambert Ducoutumany et Daniel Beslier</li></ul><!-- /wp:list -->
HTML,
    'ecole-de-tir' => <<<'HTML'
<!-- wp:paragraph {"className":"stlg-lead"} --><p class="stlg-lead">L’école de tir du STLG est encadrée par les membres de l’équipe pédagogique mentionnés ci-dessous. Les sources actuelles ne précisent pas les modalités d’inscription ni le fonctionnement détaillé de l’école.</p><!-- /wp:paragraph -->
<!-- wp:heading --><h2>Encadrement et créneaux publiés</h2><!-- /wp:heading -->
<!-- wp:table {"className":"is-style-stripes stlg-hours-table"} --><figure class="wp-block-table is-style-stripes stlg-hours-table"><table><thead><tr><th>Encadrant</th><th>Créneau indiqué</th><th>Information</th></tr></thead><tbody><tr><td><strong>Claude Peyrebere</strong></td><td>Lundi, 17 h 30–20 h</td><td>École de tir</td></tr><tr><td><strong>Georges Collet</strong></td><td>Mercredi, 14 h–19 h</td><td>École de tir</td></tr><tr><td><strong>Joel Magnier</strong></td><td>Vendredi, 20 h–21 h</td><td>École de tir</td></tr><tr><td><strong>Lambert Ducoutumany</strong></td><td>Samedi, 14 h–21 h</td><td>Certificat professionnel de moniteur de tir</td></tr></tbody></table></figure><!-- /wp:table -->
<!-- wp:paragraph {"className":"stlg-notice"} --><p class="stlg-notice">Pour confirmer les créneaux et obtenir les informations d’inscription, contactez le club avant de vous déplacer.</p><!-- /wp:paragraph -->
<!-- wp:paragraph {"className":"stlg-page-link"} --><p class="stlg-page-link"><a href="/contact/">Consulter les coordonnées du club</a></p><!-- /wp:paragraph -->
HTML,
);

foreach ($pages as $slug => $content) {
    $page = get_page_by_path($slug, OBJECT, 'page');
    if (! $page) {
        WP_CLI::error("Page not found: {$slug}");
    }
    $result = wp_update_post(array('ID' => $page->ID, 'post_content' => $content), true);
    if (is_wp_error($result)) {
        WP_CLI::error($result->get_error_message());
    }
    WP_CLI::success("Updated /{$slug}/ (ID {$page->ID})");
}
