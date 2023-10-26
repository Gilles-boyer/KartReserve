# KartReserve

KartReserve est une application web pour gérer les réservations de karting au Circuit Felix Guichard. L'application est divisée en deux parties principales : l'API et le front-end web.

## Structure du projet

Le projet est organisé en deux dossiers principaux :

1. `api` : Contient le code de l'API développée avec Laravel.
2. `web` : Contient le code du front-end développé avec Vue.js.

## Installation

### Prérequis

- PHP 7.4 ou supérieur
- Composer
- Node.js
- npm

### Étapes d'installation

1. Clonez le dépôt GitHub sur votre machine locale.
2. Naviguez vers le dossier `api` et installez les dépendances PHP avec la commande `composer install`.
3. Toujours dans le dossier `api`, copiez `.env.example` en `.env` et configurez vos variables d'environnement.
4. Dans le dossier `api`, lancez les migrations de la base de données avec la commande `php artisan migrate`.
5. Naviguez vers le dossier `web` et installez les dépendances JavaScript avec la commande `npm install`.
6. Toujours dans le dossier `web`, copiez `.env.example` en `.env` et configurez vos variables d'environnement.
7. Dans le dossier `web`, construisez votre application avec la commande `npm run build`.

## Utilisation

Pour lancer l'API, naviguez vers le dossier `api` et utilisez la commande `php artisan serve`.

Pour lancer le front-end, naviguez vers le dossier `web` et utilisez la commande `npm run serve`.

## Contribution

Les contributions sont les bienvenues ! N'hésitez pas à ouvrir une issue ou à soumettre une pull request.

## Licence

Ce projet est sous licence MIT.
