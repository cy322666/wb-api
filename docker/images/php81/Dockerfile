FROM php:8.1-cli-alpine

WORKDIR /app

# PHP: Copy configuration files & remove dist files
RUN #mkdir /phpIni
#COPY files/bin /usr/local/bin/
COPY files/php/php.ini /usr/local/etc/php/conf.d/php.ini
#COPY files/php/ext /phpIni

# SYS: Install required packages
RUN apk --no-cache upgrade && \
    apk --no-cache add bash git sudo openssh libxml2-dev postgresql-dev oniguruma-dev autoconf g++ make npm freetype-dev libjpeg-turbo-dev libpng-dev libzip-dev

# COMPOSER: install binary and prestissimo
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/bin --filename=composer

# PHP: Install php extensions
RUN pecl channel-update pecl.php.net
RUN pecl install pcov
RUN pecl install swoole

#RUN docker-php-ext-configure gd --with-freetype --with-jpeg

#gd sockets iconv
RUN docker-php-ext-install mbstring xml pcntl zip pdo pdo_mysql bcmath soap

#sockets gd iconv
RUN docker-php-ext-enable mbstring xml zip swoole pcov pcntl bcmath pdo pdo_mysql soap

RUN docker-php-ext-install exif

RUN docker-php-ext-install -j "$(nproc)" gd


RUN docker-php-ext-install intl opcache \
    && pecl install apcu \
    && docker-php-ext-enable apcu \
    && docker-php-ext-configure zip \
    && docker-php-ext-install zip

# fix work iconv library with alphine
RUN apk add --no-cache --repository http://dl-cdn.alpinelinux.org/alpine/edge/community/ --allow-untrusted gnu-libiconv
ENV LD_PRELOAD /usr/lib/preloadable_libiconv.so php
ENV NODE_PATH "/home/www-data/.npm-global/lib/node_modules"

RUN apk add --no-cache nodejs npm && \
    mkdir "/home/www-data/.npm-global/" && \
    npm config set prefix "/home/www-data/.npm-global/" && \
    npm install -g chokidar

ENV SWOOLE_MAX_REQUESTS "500"
ENV SWOOLE_TASK_WORKERS "auto"
ENV SWOOLE_WATCH $true
ENV SWOOLE_WORKERS "auto"

RUN chown -R www-data:www-data /app

#RUN chmod -R 777 storage/

COPY ./start.sh /
RUN chmod +x /start.sh
ENTRYPOINT ["/start.sh"]
