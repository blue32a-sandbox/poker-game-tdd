FROM php:8.1-fpm-alpine

RUN apk update \
    && apk add --update-cache --no-cache \
        git \
        zip \
        unzip

COPY --from=composer:2.2 /usr/bin/composer /usr/bin/composer
