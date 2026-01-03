FROM serversideup/php:8.4-fpm-nginx

ENV COMPOSER_ALLOW_SUPERUSER=1

USER root

# 1. Instalamos librerías del sistema
# 2. Instalamos las extensiones de PHP (intl es la que falta, agregamos gd y bcmath por Filament)
RUN apt-get update && apt-get install -y \
    zip \
    unzip \
    libpq-dev \
    libicu-dev \
    libpng-dev \
    libjpeg-dev \
    && docker-php-ext-install intl gd bcmath \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

WORKDIR /var/www/html

COPY --chown=www-data:www-data . .

# Ahora composer no debería dar error
RUN composer install --no-dev --optimize-autoloader

RUN chmod -R 775 storage bootstrap/cache

EXPOSE 8080