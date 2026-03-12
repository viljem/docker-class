# Imagen base oficial de PHP 8.2 con Apache
FROM php:8.2-apache

# Instalar extensión mysqli para conectar con MySQL
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Habilitar mod_rewrite de Apache (útil para URLs amigables)
RUN a2enmod rewrite
