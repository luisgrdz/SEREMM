# Usamos una imagen base oficial de PHP con FPM y Nginx pre-instalado
# Esta imagen de serversideup es altamente recomendada para Laravel
FROM serversideup/php:8.3-fpm-nginx

# Cambiamos a root para instalar dependencias si es necesario
USER root

# Instalamos extensiones de PHP necesarias para Laravel 12 y Filament
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    zip \
    unzip \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd bcmath intl

# Configuramos el directorio de trabajo
WORKDIR /var/www/html

# Copiamos los archivos del proyecto
COPY --chown=www-data:www-data . .

# Instalamos dependencias de Composer
RUN composer install --no-dev --optimize-autoloader

# Configuramos permisos para Laravel
RUN chmod -R 775 storage bootstrap/cache

# Exponemos el puerto que usa Render (por defecto suele buscar el 8080 o 10000)
# Pero esta imagen usa el 8080 por defecto para usuarios no-root
EXPOSE 8080

# El comando de inicio ya está gestionado por la imagen base