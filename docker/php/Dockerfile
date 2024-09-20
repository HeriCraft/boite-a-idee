FROM php:8.3-fpm

RUN apt-get update && \
    apt-get install -y libzip-dev libicu-dev libpng-dev libjpeg-dev libfreetype6-dev && \
    docker-php-ext-configure gd --with-freetype --with-jpeg && \
    docker-php-ext-install gd zip pdo pdo_mysql intl

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Install XDEBUG
RUN pecl install xdebug && docker-php-ext-enable xdebug

# Set the working directory
WORKDIR /var/www/html

EXPOSE 9000