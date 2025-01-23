# Démarrer le projet Laravel Groovie

## Prérequis

- PHP >= 8.0
- Composer
- Node.js et npm

## Installation

1. Clonez le dépôt :
    ```bash
    git clone https://github.com/PlushyLobster/Groovie.git
    cd Groovie
    ```

2. Installez les dépendances PHP avec Composer :
    ```bash
    composer install
    ```

3. Installez les dépendances JavaScript avec npm :
    ```bash
    npm install
    npm run build
    ```

4. Copiez le fichier `.env.example` en `.env` et configurez vos variables d'environnement :

    - **Windows** :
        ```bash
        copy .env.example .env
        ```

    - **Mac/Linux** :
        ```bash
        cp .env.example .env
        ```

5. Générez la clé de l'application :
    ```bash
    php artisan key:generate
    ```

6. Exécutez les migrations de la base de données :
    ```bash
    php artisan migrate
    ```
7. Création du lien symbolique pour le stockage :
    ```bash
    php artisan storage:link
    ```

## Démarrer le serveur de développement

Pour démarrer le serveur de développement Laravel, exécutez :

Ces commandes permettent de démarrer le serveur de développement Laravel et le serveur de développement Vite.

**À effectuer dans deux terminaux différents :**
```bash
  npm run dev
```
```bash
  php artisan serve --port=8000
```
## Pour effectuer les tests unitaires
```bash
  php artisan test
```

Adresses du serveur de développement :
http://localhost:8000.


Ce `README.md` fournit des instructions de base pour démarrer 
un projet Laravel, y compris l'installation des dépendances et 
la configuration initiale.


## Pour Thomas
### Pour récupérer les modifications des autres membres
```bash
  git checkout main
  git pull
  git checkout Amelie
  git pull
  git checkout Florian
  git pull
  git checkout Theo
  git pull
  git checkout Thomas
  git pull
  git checkout main
```
### Pour fusionner la branche main avec toutes les autres branches
```bash
  git checkout Amelie
  git merge main
  git push
  git checkout Florian
  git merge main
  git push
  git checkout Theo
  git merge main
  git push
  git checkout Thomas
  git merge main
  git push
```
