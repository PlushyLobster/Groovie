#!/usr/bin/env bash

php artisan key:generate
sleep 5
php artisan migrate --seed
php artisan storage:link
docker-php-entrypoint apache2-foreground

