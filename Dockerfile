# Comando para correr este dockerfile
# docker-compose up --build

FROM php:8-apache

# Instala el controlador PDO MySQL
RUN docker-php-ext-install pdo_mysql

# Instala PDO versión 3 (actualización adicional)
RUN docker-php-ext-install -j$(nproc) pdo

RUN apt-get update && apt-get install -y \
    git libzip-dev unzip \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*

RUN docker-php-ext-install zip

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

