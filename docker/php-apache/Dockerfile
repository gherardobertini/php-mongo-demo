FROM php:8.0-apache

# packages
RUN apt-get update -y && apt-get upgrade -y && apt-get install -y \
    git \
    libssl-dev \
    libzip-dev \
    unzip \
    vim \
    zlib1g-dev \
    && rm -rf /var/lib/apt \
    && docker-php-ext-install zip

# MongoDB #
RUN pecl install mongodb && docker-php-ext-enable mongodb
RUN echo "extension=mongodb.so" >> /usr/local/etc/php/php.ini

# Composer #
COPY --from=composer /usr/bin/composer /usr/bin/composer

EXPOSE 80 443

