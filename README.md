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

## Démarrer le serveur de développement

Pour démarrer le serveur de développement Laravel, exécutez :

Ces commandes permettent de démarrer le serveur de développement Laravel et le serveur de développement Vite.

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
http://localhost:5173.


Ce `README.md` fournit des instructions de base pour démarrer 
un projet Laravel, y compris l'installation des dépendances et 
la configuration initiale.
