FROM php:8-apache

# Instalar extensiones adicionales
RUN docker-php-ext-install mysqli

