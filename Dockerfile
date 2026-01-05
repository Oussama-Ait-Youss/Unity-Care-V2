FROM php:8.2-apache

RUN apt-get update && apt-get upgrade -y

# FIX: Added 'mysqli' here. 
# Your error log showed the app uses mysqli, so it must be installed.
RUN docker-php-ext-install pdo pdo_mysql mysqli

RUN a2enmod rewrite

WORKDIR /var/www/html