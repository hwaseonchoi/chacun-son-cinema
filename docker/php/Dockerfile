FROM php:8.0-fpm

RUN apt-get update \
    && apt-get install -y --no-install-recommends vim curl debconf git apt-transport-https apt-utils \
    build-essential locales acl mailutils wget zip unzip \
    gnupg gnupg1 gnupg2 \
    libcurl4-openssl-dev pkg-config libssl-dev \
    libpq-dev \
    && docker-php-ext-install pgsql \
    && docker-php-ext-install pdo_pgsql

#COPY php.ini /usr/local/etc/php/php.ini
COPY php-fpm-pool.conf /etc/php/7.4/pool.d/www.conf

RUN curl -sSk https://getcomposer.org/installer | php -- --disable-tls && \
   mv composer.phar /usr/local/bin/composer

RUN groupadd dev -g 1001
RUN useradd dev -u 1001 -g dev -d /home/dev -m

RUN rm -rf /var/lib/apt/lists/*
RUN echo "en_US.UTF-8 UTF-8" > /etc/locale.gen && \
    echo "fr_FR.UTF-8 UTF-8" >> /etc/locale.gen && \
    locale-gen

WORKDIR /var/www

EXPOSE 9000
CMD ["php-fpm"]
