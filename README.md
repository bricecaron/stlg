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

Arrêtez l’environnement sans supprimer les données :

```console
docker compose down
```

La base de données, le cœur WordPress, les médias envoyés dans `wp-content/uploads` et les secrets locaux sont conservés hors de Git. Pour supprimer volontairement les données locales du projet, utilisez `docker compose down --volumes`.
