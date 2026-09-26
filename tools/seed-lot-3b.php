<?php
/**
 * Create native categories and two labelled demo posts for issue #4.
 * Run: docker compose --profile tools run --rm cli wp eval-file wp-content/stlg-tools/seed-lot-3b.php
 */
if (! defined('WP_CLI') || ! WP_CLI) {
    exit("Run this file with WP-CLI.\n");
}
$category_ids = array();
foreach (array('actualites' => 'Actualités', 'resultats' => 'Résultats') as $slug => $name) {
    $term = get_term_by('slug', $slug, 'category');
    if (! $term) {
        $created = wp_insert_term($name, 'category', array('slug' => $slug));
        if (is_wp_error($created)) { WP_CLI::error($created->get_error_message()); }
        $category_ids[$slug] = (int) $created['term_id'];
    } else {
        $category_ids[$slug] = (int) $term->term_id;
    }
    WP_CLI::success("Category ready: {$name}");
}
$demos = array(
    'demonstration-actualite-stlg' => array('[Démonstration] Une actualité du STLG', 'actualites', '<!-- wp:paragraph --><p>Cette publication fictive sert uniquement à valider le fonctionnement éditorial et le rendu du site. Elle ne présente aucune information réelle sur le club.</p><!-- /wp:paragraph -->'),
    'demonstration-resultat-stlg' => array('[Démonstration] Un résultat sportif', 'resultats', '<!-- wp:paragraph --><p>Ce résultat fictif sert uniquement à tester la catégorie Résultats. Il ne correspond à aucune compétition ni à aucun sportif réel.</p><!-- /wp:paragraph -->'),
);
foreach ($demos as $slug => $demo) {
    $post = get_page_by_path($slug, OBJECT, 'post');
    $data = array('post_title' => $demo[0], 'post_name' => $slug, 'post_content' => $demo[2], 'post_excerpt' => 'Publication fictive créée pour tester le système éditorial STLG.', 'post_status' => 'publish', 'post_type' => 'post', 'post_category' => array($category_ids[$demo[1]]), 'comment_status' => 'closed', 'ping_status' => 'closed');
    if ($post) { $data['ID'] = $post->ID; }
    $result = wp_insert_post($data, true);
    if (is_wp_error($result)) { WP_CLI::error($result->get_error_message()); }
    WP_CLI::success("Demo post ready: {$demo[0]} (ID {$result})");
}
