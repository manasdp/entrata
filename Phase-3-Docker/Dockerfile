FROM php:8.1-apache

# Copy project files
COPY ./Phase-1-Development/Fashion-fusion/ /var/www/html/

# Install mysqli extension
RUN docker-php-ext-install mysqli

# Enable Apache rewrite
RUN a2enmod rewrite

EXPOSE 80