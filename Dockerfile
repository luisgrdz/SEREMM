FROM serversideup/php:8.4-fpm-nginx

ENV COMPOSER_ALLOW_SUPERUSER=1
USER root

# Instalamos Node.js para compilar assets y librerías de PHP
RUN apt-get update && apt-get install -y \
    zip unzip libpq-dev libicu-dev libpng-dev libjpeg-dev \
    nodejs npm \ 
    && docker-php-ext-install intl gd bcmath \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

WORKDIR /var/www/html
COPY --chown=www-data:www-data . .

# 1. Instalamos PHP dependencies
RUN composer install --no-dev --optimize-autoloader

# 2. Instalamos y Compilamos assets (CSS/JS)
RUN npm install && npm run build

# 3. Publicamos los assets de Filament
RUN php artisan filament:assets

RUN chmod -R 775 storage bootstrap/cache
EXPOSE 8080