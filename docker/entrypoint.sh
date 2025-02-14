#!/usr/bin/env bash

php artisan key:generate
php artisan migrate --seed
docker-php-entrypoint apache2-foreground

