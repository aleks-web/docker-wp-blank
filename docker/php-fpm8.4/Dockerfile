FROM php:8.4-fpm-alpine

# Устанавливаем Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer


RUN apk update && apk upgrade  
RUN apk add --no-cache libjpeg-turbo-dev libwebp-dev libpng-dev
RUN apk add --no-cache openssh-server
RUN apk add --no-cache unzip libzip-dev
RUN apk add --no-cache nano git
RUN apk add --no-cache gmp gmp-dev
RUN apk add --no-cache freetype-dev


RUN docker-php-ext-install zip
RUN docker-php-ext-install gmp
RUN docker-php-ext-install mysqli pdo pdo_mysql && docker-php-ext-enable pdo_mysql
RUN docker-php-ext-install gd
RUN docker-php-ext-install opcache
RUN apk add --no-cache pcre-dev $PHPIZE_DEPS

# configure gd
RUN docker-php-ext-configure gd --with-freetype --with-jpeg
RUN docker-php-ext-configure gd --with-freetype=/usr/include/ --with-jpeg=/usr/include/ --with-webp=/usr/include/
RUN docker-php-ext-install -j$(nproc) gd

ARG UNAME

WORKDIR /var/www/wp
CMD chmod -R 777 /var/www/wp

CMD ["php-fpm", "-R"]