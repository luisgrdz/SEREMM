# Cambiamos la versión de 8.3 a 8.4
FROM serversideup/php:8.4-fpm-nginx

ENV COMPOSER_ALLOW_SUPERUSER=1

USER root

# Instalamos dependencias de sistema (agregamos libicu-dev por si acaso para intl)
RUN apt-get update && apt-get install -y \
    zip \
    unzip \
    libpq-dev \
    libicu-dev \ 
    && apt-get clean && rm -rf /var/lib/apt/lists/*

WORKDIR /var/www/html

COPY --chown=www-data:www-data . .

# Instalamos dependencias
RUN composer install --no-dev --optimize-autoloader

RUN chmod -R 775 storage bootstrap/cache

EXPOSE 8080