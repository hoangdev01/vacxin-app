FROM php:8.1.0-fpm-alpine

WORKDIR /var/www/html
RUN apk update && apk add --no-cache \
    freetype \
    libpng \
    libjpeg-turbo \
    freetype-dev \
    libpng-dev \
    libjpeg-turbo-dev
RUN docker-php-ext-configure gd \
    --with-freetype --with-jpeg
RUN docker-php-ext-install pdo pdo_mysql gd
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
