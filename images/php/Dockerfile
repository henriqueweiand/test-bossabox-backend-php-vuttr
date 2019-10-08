FROM php:fpm-alpine

RUN set -ex \
  && apk --no-cache add \
    postgresql-dev
    
# lumen packages
RUN docker-php-ext-install mbstring tokenizer mysqli pdo_mysql pgsql pdo_pgsql 
