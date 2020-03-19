FROM php:fpm-alpine

RUN set -ex \
    && sed -i 's/dl-cdn.alpinelinux.org/mirrors.ustc.edu.cn/g' /etc/apk/repositories \
    && apk upgrade --update && \
    apk add --no-cache --virtual \
        .build-deps \
        zlib zlib-dev \
        libmcrypt-dev \
        libltdl \
        freetype \
        freetype-dev \
        libjpeg-turbo \
        libjpeg-turbo-dev \
        libpng \
        libpng-dev \
        libcurl \
        curl \
        oniguruma \
        oniguruma-dev \
    && docker-php-ext-install -j$(nproc) iconv gd pdo pdo_mysql mysqli mbstring opcache \
    && docker-php-ext-configure gd \
    && apk del .build-deps

