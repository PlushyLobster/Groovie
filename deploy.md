# Processus de déploiement d'un site web Laravel sur un serveur virtuel

## Installation des paquets nécessaires
```bash
sudo apt install
sudo apt update
sudo apt upgrade
sudo apt install apache2 php
```

## Vérification des configurations de certificats disponibles
```bash
  ls /etc/apache2/sites-available/
```

## Liste des configurations actives

```bash
  ls /etc/apache2/sites-enabled/
```

## Liste des modules disponibles d'Apache2

```bash
  ls /etc/apache2/mods-available/
```

## Activation de la configuration SSL

```bash
  sudo a2enmod ssl
  sudo systemctl reload apache2
```

## Lien d'accès
par exemple : https://91.134.32.149

## Installation de la base de données
```bash
  sudo apt install mariadb-server
```

## Configuration de l'installation de la base de données
```bash
  sudo mariadb_secure_installation
```

## Accès à l'interface de la base de données
```bash
  sudo mariadb 
```
## Création d'un utilisateur et attribution des permissions
```bash
  GRANT ALL PRIVILEGES ON GroovieRecette.* TO 'formation'@'%' IDENTIFIED BY '';
```
## Requête pour lister les utilisateurs
```bash
  select * from mysql.user;
```

## Génération de la clé SSH du serveur (GitHub)
```bash
  ssh-keygen -C clone
```

## Installation de Git
```bash
  sudo apt install git
```

## Présentation des clés SSH
```bash
  eval `ssh-agent`
```

## Chargement de la clé à utiliser
```bash
  ssh-add ~/.ssh/GitHub
```
## Stockage du répertoire du git clone
```bash
  sudo mkdir app
  sudo chown debian:www-data ./app
  cd ./app
```
## Clonage du dépôt sur la machine grâce à la clé SSH
```bash
  git clone git@github.com:PlushyLobster/Groovie.git
```
## Installation des dépendances nécessaires
```bash
  sudo apt install composer
  sudo apt install NodeJS
  sudo apt install npm
  sudo apt install php-mysql
```
## Installation des dépendances PHP nécessaires
```bash
  sudo apt search php-dom
  ```

```bash
  sudo apt install php-xml
  sudo apt install php-dompdf
```
## Installation des dépendances du projet

```bash
  composer install
  npm install
  php artisan migrate
  php artisan db:seed
  npm run build
```
## Déploiement avec Apache2
```bash
  sudo cp ./default-ssl.conf /etc/apache2/sites-available/
  sudo systemctl restart apache2
```
## Attribution de la propriété du répertoire Groovie à l'utilisateur debian pour avoir toutes les permissions
```bash
  sudo chown -R debian:www-data /var/www/app/Groovie
```
