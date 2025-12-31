# Usamos la imagen optimizada para Laravel (PHP 8.3 + Nginx)
FROM serversideup/php:8.3-fpm-nginx

# Seteamos variables de entorno para que Composer no de problemas como root
ENV COMPOSER_ALLOW_SUPERUSER=1

# Cambiamos a root para configurar carpetas
USER root

# Instalamos SOLAMENTE dependencias de sistema necesarias (sin compilar PHP)
RUN apt-get update && apt-get install -y \
    zip \
    unzip \
    libpq-dev \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

# Directorio de trabajo
WORKDIR /var/www/html

# Copiamos el proyecto con los permisos correctos para el usuario de la imagen
COPY --chown=www-data:www-data . .

# Instalamos las dependencias de Composer (Laravel + Filament)
RUN composer install --no-dev --optimize-autoloader

# Ajustamos permisos finales para storage y cache
RUN chmod -R 775 storage bootstrap/cache

# Exponemos el puerto de Render
EXPOSE 8080

# No necesitamos poner CMD, la imagen base ya sabe iniciar Nginx y PHP-FPM