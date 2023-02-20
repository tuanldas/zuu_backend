FROM php:8.1-fpm

ARG WWWGROUP

WORKDIR /var/www/app

ENV TZ=UTC

RUN ln -snf /usr/share/zoneinfo/$TZ /etc/localtime && echo $TZ > /etc/timezone
RUN apt-get update \
    && apt-get install -y apt-utils \
    && apt-get install -y \
        git \
        wget \
        zip \
        unzip \
        curl \
        libssl-dev \
        libxml2-dev \
        libfreetype6-dev \
        libjpeg62-turbo-dev \
        libpng-dev \
        libsodium-dev \
        libmcrypt-dev \
        libmemcached-dev \
        supervisor \
    && apt-get install cron -y \
    && apt-get clean \

RUN docker-php-ext-install pdo_mysql mbstring exif bcmath gd

RUN docker-php-ext-configure pcntl --enable-pcntl \
  && docker-php-ext-install \
    pcntl

# Composer
RUN curl -sS https://getcomposer.org/installer | php \
    && mv composer.phar /usr/local/bin/composer \
    && chmod +x /usr/local/bin/composer \
    && composer self-update
RUN docker-php-ext-install pdo_mysql

# Node.js
RUN curl -fsSL https://deb.nodesource.com/setup_18.x | bash - \
    && apt-get update \
    && apt-get install -y nodejs \
    && apt-get clean \
    && apt-get install -y vim

RUN sh -c "$(wget -O- https://github.com/deluan/zsh-in-docker/releases/download/v1.1.2/zsh-in-docker.sh)" -- \
    -t frisk

COPY . ./

COPY php.ini /usr/local/etc/php/conf.d/

VOLUME /var/www/app

ADD ./supervisor.conf.d/php-fpm.conf /etc/supervisor/conf.d/php-fpm.conf
ADD ./supervisor.conf.d/supervisord.conf /etc/supervisor/conf.d/supervisord.conf
