FROM php:8.2-apache AS phpbuild
RUN apt-get update  && apt-get install -y libzip-dev unzip \
	&& docker-php-ext-install -j$(nproc) pdo pdo_mysql zip

COPY --from=composer /usr/bin/composer /usr/bin/composer
RUN composer self-update
WORKDIR /usr/src/myapp
COPY . .
RUN composer install

FROM node:18 AS nodebuild
WORKDIR /usr/src/myapp
COPY package.json package-lock.json postcss.config.js vite.config.js .
COPY public/ ./public
COPY resources/ ./resources
RUN npm install
RUN npm run build

FROM php:8.2-apache
RUN apt-get update  && apt-get install -y libxml2 \
	&& docker-php-ext-install -j$(nproc) pdo pdo_mysql

COPY --chmod=755 ./docker/entrypoint.sh /entrypoint.sh
ENTRYPOINT ["/entrypoint.sh"]
CMD []

COPY ./docker/groovie.conf /etc/apache2/sites-available/groovie.conf
RUN a2enmod rewrite
RUN a2ensite groovie
RUN a2dissite 000-default

COPY . /var/www/html/
COPY --from=phpbuild --chown=www-data:www-data /usr/src/myapp/ /var/www/html/
COPY --from=nodebuild --chown=www-data:www-data /usr/src/myapp/public /var/www/html/public
