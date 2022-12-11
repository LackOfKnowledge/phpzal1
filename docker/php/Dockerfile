FROM php:8.1-fpm

ENV DEBIAN_FRONTEND noninteractive


RUN apt-get update && \
  apt-get install -y --no-install-recommends apt-utils nano sudo unzip git && \
  rm -r /var/lib/apt/lists/*

# Xdebug
RUN pecl install xdebug && \
  docker-php-ext-enable xdebug

# pdo_mysql
RUN docker-php-ext-install pdo_mysql

# intl
RUN apt-get update && \
  apt-get install -y --no-install-recommends libicu-dev && \
  docker-php-ext-install intl  && \
  rm -r /var/lib/apt/lists/*

# xsl
RUN apt-get update && \
  apt-get install -y --no-install-recommends libxslt-dev && \
  docker-php-ext-install xsl && \
  rm -r /var/lib/apt/lists/*

# gd
RUN apt-get update && \
  apt-get install -y --no-install-recommends libfreetype6-dev libjpeg62-turbo-dev libpng-dev libwebp-dev && \
  docker-php-ext-configure gd --with-freetype --with-jpeg --with-webp && \
  docker-php-ext-install -j$(nproc) gd && \
  rm -r /var/lib/apt/lists/*

# imagick
RUN apt-get update && \
  apt-get install -y --no-install-recommends libmagickwand-dev && \
  pecl install imagick -y && \
  docker-php-ext-enable imagick && \
  rm -r /var/lib/apt/lists/*

# exif
RUN docker-php-ext-install exif

# zip
RUN apt-get update && \
  apt-get install -y --no-install-recommends libzip-dev && \
  docker-php-ext-install zip && \
  rm -r /var/lib/apt/lists/*

RUN docker-php-ext-install calendar
