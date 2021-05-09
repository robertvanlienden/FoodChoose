FROM composer:1.10.21 AS composer

#------------------------------------

FROM php:7.2-fpm-alpine

RUN apk add --no-cache make acl mysql-client zlib-dev && \
    docker-php-ext-install pdo_mysql zip

COPY --from=composer /usr/bin/composer /usr/bin/composer

ENV COMPOSER_ALLOW_SUPERUSER=1
RUN composer global require "hirak/prestissimo:^0.3" --prefer-dist --no-progress --no-suggest --classmap-authoritative && \
    composer clear-cache

WORKDIR /var/www

ARG APP_ENV=prod

COPY composer.json ./
COPY composer.lock ./

RUN composer install --prefer-dist --no-dev --no-autoloader --no-scripts --no-progress --no-suggest && \
    composer clear-cache

COPY app app/
COPY bootstrap bootstrap/
COPY config config/
COPY database database/
COPY public public/
COPY resources resources/
COPY routes routes/
COPY storage storage/

RUN composer dump-autoload --no-scripts

COPY dev/docker/app/docker-entrypoint.sh /usr/local/bin/docker-entrypoint
RUN chmod +x /usr/local/bin/docker-entrypoint

ENTRYPOINT ["docker-entrypoint"]

CMD ["php-fpm"]

