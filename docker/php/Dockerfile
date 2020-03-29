FROM php:7.3-apache

RUN apt-get update          \
    && apt-get install -y   \
        git                 \
        zlib1g-dev          \
        zip                 \
        unzip               \
        libxml2-dev         \
    && pecl install xdebug                                                             \
    && docker-php-ext-install mysqli pdo_mysql iconv simplexml                                      \
    && docker-php-ext-enable xdebug                                                          \
    && apt-get clean all                                                                            \
    && rm -rvf /var/lib/apt/lists/*                                                                 \
    && a2enmod rewrite headers

RUN curl -sS https://getcomposer.org/installer | php -- --filename=composer --install-dir=/bin
ENV PATH /root/.composer/vendor/bin:$PATH

WORKDIR /var/www/html