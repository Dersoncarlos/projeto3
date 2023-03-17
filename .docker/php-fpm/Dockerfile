# Base image
FROM php:8.1-fpm

# Fix debconf warnings upon build
ARG DEBIAN_FRONTEND=noninteractive

# Run apt update and install some dependancies needed for docker-php-ext
RUN apt-get update \
    && apt-get -y install \
    unixodbc-dev \
    libcurl4-openssl-dev \
    libicu-dev \
    libssl-dev \
    git \
    zip \
    libbz2-dev \
    && apt-get clean; 

RUN docker-php-ext-install bcmath bz2 curl opcache sockets intl

RUN yes | pecl install xdebug-3.1.5 \
    && echo "zend_extension=$(find /usr/local/lib/php/extensions/ -name xdebug.so)" > /usr/local/etc/php/conf.d/xdebug.ini 

# Install PHP extensions    
RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" \
    && php composer-setup.php \
    && mv composer.phar /usr/local/bin/composer
    
#GD
RUN apt-get update && apt-get install -y \
        libfreetype6-dev \
        libjpeg62-turbo-dev \
        libpng-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) gd

RUN rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* /usr/share/doc/*
