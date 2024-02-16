# Comando para correr este dockerfile
# docker-compose up --build

FROM php:8-apache

# Instala el controlador PDO MySQL
RUN docker-php-ext-install pdo_mysql

# Instala PDO versión 3 (actualización adicional)
RUN docker-php-ext-install -j$(nproc) pdo


