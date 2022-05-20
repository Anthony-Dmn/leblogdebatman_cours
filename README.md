# Projet Le Blog de Batman

## Installation

```
git clone https://github.com/Anthony-Dmn/leblogdebatman_cours.git
```

### Modifier les paramètres d'environnement dans le fichier .env pour les faire correspondre à votre environnement (Accès base de données, clés Google Recaptcha, etc...)

```
# Accès base de données à modifier
DATABASE_URL="mysql://root:@127.0.0.1:3306/leblogdebatman?serverVersion=5.7&charset=utf8mb4"

# Clés Google Recaptcha à modifier
GOOGLE_RECAPTCHA_SITE_KEY=XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
GOOGLE_RECAPTCHA_PRIVATE_KEY=XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
```

### Déplacer le terminal dans le dossier cloné du projet
```
cd leblogdebatman_cours
```

### Taper les commandes suivantes :
```
composer install
symfony console doctrine:database:create
symfony console make:migration
symfony console doctrine:migration:migrate
symfony console doctrine:fixtures:load
symfony console assets:install public
```

Les fixtures créeront :
* Un compte admin (email: admin@a.a, mot de passe : aaaaaaaaA7/ )
* 10 comptes utilisateurs (email aléatoire, mot de passe : aaaaaaaaA7/ )
* 200 articles
* Entre 0 et 10 commentaires par article

### Démarrer le serveur Symfony :
```
symfony serve
```