# Roadmap — STLG

Cette roadmap organise l'évolution du nouveau site WordPress de la Société de Tir de Livry-Gargan (STLG). Elle reprend le mode de travail utilisé sur Shootering : lots fonctionnels courts, priorité à une base saine, puis enrichissement progressif du contenu, de l'administration et de la qualité.

## Principes directeurs

- Le dépôt Git contient le code et la configuration du projet, pas une sauvegarde complète de WordPress.
- Le thème enfant `STLG` reste la source de vérité pour l'identité visuelle et les développements spécifiques.
- Le site doit rester simple à administrer par une association : éviter les usines à gaz, les page builders lourds et les plugins non indispensables.
- Les contenus récurrents doivent être administrables depuis WordPress lorsque cela apporte une vraie valeur.
- Les développements doivent rester sobres, responsive, accessibles et compatibles avec un futur hébergement sur serveur dédié.
- Toute évolution significative doit préserver la sécurité, la maintenabilité et la capacité de déploiement.

---

## Lot 1 — Fondation WordPress et identité visuelle

**Statut : en cours / largement réalisé**

Objectifs :

- environnement Docker local reproductible ;
- WordPress + MariaDB ;
- thème enfant `STLG` ;
- identité visuelle bleu / jaune basée sur le logo officiel ;
- homepage moderne ;
- header et footer globaux ;
- responsive desktop / tablette / mobile ;
- structure Git propre avec exclusion des données, uploads, secrets et volumes.

À vérifier / finaliser :

- cohérence visuelle du header sur toutes les pages ;
- qualité responsive ;
- suppression des restes éventuels du thème parent ;
- nettoyage des contenus WordPress de démonstration.

---

## Lot 2 — URLs propres, navigation et architecture éditoriale

**Priorité : très haute**

Objectifs :

- activer des permaliens lisibles basés sur les slugs ;
- éliminer les URLs de type `?page_id=...` ;
- définir une architecture de navigation centrée sur les besoins des visiteurs ;
- mettre à jour le menu global et les liens de la homepage ;
- supprimer ou rediriger les anciennes entrées devenues inutiles.

Architecture cible proposée :

- **Le club**
  - Présentation
  - Installations
- **Disciplines**
  - 10 m
  - 25 m
  - 30 m
  - 50 m
- **École de tir**
- **Actualités & résultats**
- **Infos pratiques**
  - Horaires
  - Accès
  - Liens fédéraux
- **Contact**

Slugs cibles à privilégier :

- `/le-club/`
- `/disciplines/`
- `/ecole-de-tir/`
- `/actualites/`
- `/resultats/`
- `/horaires/`
- `/acces/`
- `/contact/`

Contraintes :

- prévoir les redirections nécessaires si des anciennes URLs deviennent publiques ;
- conserver un menu principal compact ;
- éviter une entrée principale « Liens utiles » ;
- utiliser « Horaires » plutôt que « Ouvertures » et « Accès » ou « Nous trouver » plutôt que « Plan ».

---

## Lot 3 — Pages internes et migration du contenu historique

**Priorité : haute**

Objectifs :

- reconstruire proprement les contenus de l'ancien site ;
- ne pas recopier la structure 2017 à l'identique ;
- réécrire les contenus pour une lecture web moderne ;
- créer des pages internes visuellement cohérentes avec la homepage.

Travaux prévus :

- page **Le club** : présentation, historique synthétique, installations ;
- page **Disciplines** : présentation des pratiques 10 m, 25 m, 30 m et 50 m ;
- page **École de tir** : fonctionnement, encadrement, horaires, inscription ;
- page **Horaires** : présentation claire été / hiver, exceptions et fermetures ;
- page **Accès** : adresse, repères, stationnement / transports si disponibles ;
- page **Contact** : coordonnées générales et formulaire si nécessaire ;
- déplacement des liens FFTir / Ligue / Comité dans une zone secondaire ou le footer.

À éviter :

- longs blocs de texte hérités de l'ancien site ;
- duplication des coordonnées ou horaires dans plusieurs templates ;
- informations importantes uniquement présentes sous forme d'image.

---

## Lot 4 — Actualités et résultats sportifs

**Priorité : haute**

Objectifs :

- faire vivre la homepage avec du contenu dynamique ;
- distinguer les actualités de la vie du club et les résultats sportifs ;
- éviter une page historique interminable avec toutes les photos et tous les podiums.

Approche cible :

- utiliser les articles WordPress pour commencer ;
- catégories minimales :
  - `actualites`
  - `resultats`
- chaque compétition / résultat devient une publication dédiée ;
- homepage : affichage automatique des 3 publications les plus récentes pertinentes ;
- archives propres pour les actualités et les résultats.

Évolutions possibles ensuite :

- taxonomie par discipline ;
- filtre par année ;
- galerie photo optimisée ;
- mise en avant des podiums / titres.

---

## Lot 5 — Données administrables et paramètres globaux

**Priorité : moyenne**

Objectifs :

- éviter les informations récurrentes codées en dur dans les templates ;
- conserver néanmoins un WordPress simple à administrer.

À rendre administrable en priorité :

- adresse du club ;
- téléphone ;
- e-mail général ;
- horaires ;
- texte d'alerte / fermeture exceptionnelle ;
- liens fédéraux ;
- éventuellement les principaux CTA de la homepage.

Approche :

- privilégier les mécanismes natifs WordPress ;
- n'introduire des champs personnalisés ou un plugin dédié que si le besoin le justifie réellement ;
- centraliser les données affichées à plusieurs endroits.

---

## Lot 6 — Médias et direction artistique finale

**Priorité : moyenne**

Objectifs :

- remplacer les placeholders par de vraies photos du club ;
- renforcer l'identité STLG sans surcharger le site ;
- optimiser les performances des médias.

Travaux :

- hero avec photo réelle du stand / école de tir ;
- photos des installations ;
- photos de compétitions et podiums ;
- formats modernes et tailles adaptées ;
- textes alternatifs pertinents ;
- stratégie de recadrage responsive ;
- vérification des droits d'utilisation des images.

---

## Lot 7 — Qualité, accessibilité, SEO et performance

**Priorité : avant mise en production**

Objectifs :

- préparer un site public propre, rapide et accessible.

Checklist :

- HTML sémantique ;
- navigation clavier ;
- focus visibles ;
- contrastes ;
- structure des titres ;
- attributs `alt` ;
- menu mobile accessible ;
- suppression des erreurs console / PHP ;
- optimisation CSS / JS ;
- optimisation images ;
- métadonnées SEO de base ;
- sitemap ;
- robots.txt cohérent ;
- titres et descriptions de pages ;
- Open Graph si utile ;
- favicon / icônes du site ;
- test Lighthouse ou équivalent.

---

## Lot 8 — Sécurité et exploitation

**Priorité : avant mise en production**

Objectifs :

- sécuriser WordPress et préparer son exploitation sur serveur dédié.

Travaux :

- mise à jour WordPress / thème parent / dépendances ;
- revue des plugins installés ;
- suppression des plugins / thèmes inutiles ;
- politique de comptes administrateurs ;
- mots de passe robustes ;
- protection des secrets ;
- désactivation du debug en production ;
- sauvegarde base + uploads ;
- procédure de restauration ;
- journalisation adaptée ;
- limitation de l'exposition réseau des services ;
- HTTPS ;
- headers de sécurité pertinents ;
- revue des permissions de fichiers.

---

## Lot 9 — Déploiement sur serveur dédié

**Priorité : finale**

Objectifs :

- déployer le site sur un serveur dédié sans transformer Git en sauvegarde WordPress complète.

Le dépôt reste centré sur :

- thème enfant STLG ;
- plugins spécifiques ;
- configuration de développement / déploiement pertinente ;
- documentation ;
- scripts éventuels de déploiement.

Le serveur de production conserve séparément :

- base WordPress ;
- uploads ;
- secrets ;
- configuration propre à l'environnement.

Travaux :

- définir l'architecture d'hébergement ;
- créer la configuration de production ;
- gérer les variables d'environnement ;
- préparer sauvegardes et restauration ;
- configurer domaine et HTTPS ;
- migration initiale de la base et des médias ;
- recette finale ;
- procédure de mise à jour depuis Git.

---

## Backlog / évolutions possibles

À envisager uniquement après stabilisation du socle :

- formulaire de contact antispam ;
- page dédiée aux inscriptions / tarifs ;
- calendrier des compétitions ou événements ;
- galerie photo ;
- documents téléchargeables ;
- intégration de résultats plus structurée ;
- notifications de fermeture exceptionnelle ;
- bannière d'information administrable ;
- espace réservé aux membres uniquement si un besoin métier concret apparaît.

---

## Prochaine étape recommandée

Commencer par le **Lot 2 — URLs propres, navigation et architecture éditoriale** avant d'ajouter davantage de contenu. C'est le meilleur moment pour fixer les slugs, le menu et la structure du site sans créer de dette de liens ou de redirections.
