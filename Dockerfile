# Usa la imagen base PHP con FPM
FROM php:8.1-fpm

# Instala Composer
RUN apt-get update && apt-get install -y \
    unzip \
    zip \
    git && \
    curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Instala las extensiones necesarias para Laravel
RUN docker-php-ext-install pdo_mysql

# Establece el directorio de trabajo
WORKDIR /var/www/html
