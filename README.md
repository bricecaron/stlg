# STLG — environnement WordPress local

Fondation de développement de la nouvelle version du site de la Société de Tir de Livry-Gargan. Le dépôt contient la configuration Docker et les développements propres à STLG, mais ni le cœur de WordPress ni les données du site.

## Architecture

- WordPress 6.8.3 avec Apache et PHP 8.3 ;
- MariaDB 11.4, accessible uniquement sur le réseau Docker interne ;
- volumes Docker persistants pour WordPress et MariaDB ;
- thème enfant `STLG`, basé sur le thème natif Twenty Twenty-Five.

Le thème enfant se trouve dans `src/themes/stlg`. Les futurs plugins spécifiques seront placés dans `src/plugins`.

## Prérequis

- Git ;
- Docker Desktop ;
- Docker Compose (inclus dans Docker Desktop).

## Installation

```console
git clone git@github.com:bricecaron/stlg.git
cd stlg
cp .env.example .env
```

Sous PowerShell, utilisez `Copy-Item .env.example .env` à la place de `cp`. Remplacez ensuite toutes les valeurs `change-me` dans `.env` par des secrets locaux robustes.

Démarrez l’environnement :

```console
docker compose up -d
```

WordPress est disponible sur <http://localhost:8082>. Le port peut être modifié avec `WORDPRESS_PORT` dans `.env`.

## Configuration WordPress initiale

Après une nouvelle installation WordPress :

1. créez une page publiée nommée `Accueil` avec le slug `accueil` ;
2. dans **Réglages > Lecture**, choisissez une page d’accueil statique et sélectionnez `Accueil` ;
3. dans **Réglages > Permaliens**, sélectionnez la structure **Titre de la publication** (`/%postname%/`) puis enregistrez.

La même structure de permaliens peut être appliquée avec WP-CLI :

```console
docker compose --profile tools run --rm cli wp rewrite structure '/%postname%/'
docker compose --profile tools run --rm cli wp rewrite flush
```

Les pages utilisent alors des URLs lisibles telles que `/informations/`, `/contacts/` et `/plan/`. La page `Accueil` reste accessible à la racine `/` grâce à `front-page.php`.

## Contenus STLG

Les migrations de contenu rejouables sont accessibles au service WP-CLI :

```console
docker compose --profile tools run --rm cli wp eval-file wp-content/stlg-tools/migrate-lot-3a.php
docker compose --profile tools run --rm cli wp eval-file wp-content/stlg-tools/seed-lot-3b.php
```

La seconde commande crée les catégories natives `Actualités` et `Résultats` ainsi que deux publications de démonstration clairement identifiées. Pour publier ensuite un contenu réel, utilisez simplement **Articles > Ajouter**, rédigez l’article, choisissez l’une de ces deux catégories puis publiez. L’image mise en avant reste facultative.

Arrêtez l’environnement sans supprimer les données :

```console
docker compose down
```

La base de données, le cœur WordPress, les médias envoyés dans `wp-content/uploads` et les secrets locaux sont conservés hors de Git. Pour supprimer volontairement les données locales du projet, utilisez `docker compose down --volumes`.
