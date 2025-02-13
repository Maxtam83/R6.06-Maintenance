# README

## Histoire

Ce projet est la refonte d'un ancien projet en PHP natif 5.6 se trouvant dans le dossier `ugselweb_OLD`. Nous avons pris la décision de le migrer vers PHP 8.2 en utilisant le framework Symfony afin de bénéficier des améliorations en termes de sécurité, de performance et de maintenabilité.

## Technologies utilisées

- **Langage** : PHP 8.2
- **Framework** : Symfony 7.2
- **Base de données** : Doctrine ORM avec DBAL
- **Dépendances principales** :
   - Symfony Bundles : `symfony/framework-bundle`, `symfony/security-bundle`, `symfony/twig-bundle`, `symfony/validator`, `symfony/serializer`
   - Doctrine : `doctrine/orm`, `doctrine/doctrine-bundle`, `doctrine/doctrine-migrations-bundle`
   - Outils : `symfony/console`, `symfony/dotenv`, `symfony/process`, `symfony/intl`
   - Autres : `twig/twig`, `monolog/monolog`, `symfony/mailer`, `symfony/notifier`

## Installation

1. **Cloner le projet**
   ```bash
   git clone https://github.com/Maxtam83/R6.06-Maintenance
   cd R6.06-Maintenance
   ```

2. **Installer les dépendances**
   ```bash
   composer install
   ```

3. **Configurer l'environnement**
    - Copier le fichier `.env.example` en `.env`
    - Modifier les paramètres de connexion à la base de données

4. **Créer la base de données**
   ```bash
   php bin/console doctrine:database:create
   php bin/console doctrine:migrations:migrate
   ```

5. **Lancer le serveur de développement**
   ```bash
   symfony server:start
   ```

## Contribution

- Forker le projet
- Créer une branche feature (`git checkout -b feature-nom`)
- Committer vos modifications (`git commit -m "Ajout d'une nouvelle fonctionnalité"`)
- Pousser votre branche (`git push origin feature-nom`)
- Créer une pull request

## Auteurs

- Léo Giner
- Maxime Tamarin


