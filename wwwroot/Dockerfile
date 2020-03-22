FROM php:7.3-fpm-alpine

RUN set -ex \
    && sed -i 's/dl-cdn.alpinelinux.org/mirrors.ustc.edu.cn/g' /etc/apk/repositories \
    && apk upgrade --update && \
    apk add --no-cache --virtual \
        .build-deps \
        zlib zlib-dev \
        libmcrypt-dev \
        libltdl \
        libcurl \
        curl \
        oniguruma \
        oniguruma-dev \
    && docker-php-ext-install -j$(nproc) iconv pdo pdo_mysql mysqli mbstring opcache \
    && apk del .build-deps

RUN apk add --no-cache libpng libpng-dev \
        freetype freetype-dev \
        libjpeg-turbo \
        libjpeg-turbo-dev \
    && docker-php-ext-configure gd \
        --with-freetype-dir=/usr/include/freetype2 \
        --with-png-dir=/usr/include \
        --with-jpeg-dir=/usr/include \
    && docker-php-ext-install gd \
    && apk del libpng-dev

RUN curl -o /usr/local/bin/composer https://mirrors.aliyun.com/composer/composer.phar \
    && chmod +x /usr/local/bin/composer \
    && composer config -g repo.packagist composer https://mirrors.aliyun.com/composer/

