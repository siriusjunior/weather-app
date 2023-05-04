FROM php:8.0.2-fpm

ARG ENVNAME
ARG DB_HOST
ARG MYSQL_ROOT_PASSWORD
ARG MYSQL_DATABASE
ARG MYSQL_USER
ARG MYSQL_PASSWORD

RUN apt-get update && apt-get install -y procps git libicu-dev libonig-dev libzip-dev unzip locales supervisor mariadb-client curl
ADD ./docker/php-fpm/supervisord.conf /etc/supervisor/conf.d/supervisord.conf

RUN docker-php-ext-install pdo_mysql

# nodeインストール
RUN curl -fsSL https://deb.nodesource.com/setup_16.x | bash -
RUN apt-get install -y nodejs
RUN npm install npm@latest -g vite

RUN localedef -f UTF-8 -i ja_JP ja_JP.UTF-8

# timezone environment
ENV TZ=Asia/Tokyo \
    # locale
    LANG=ja_JP.UTF-8 \
    LANGUAGE=ja_JP:ja \
    LC_ALL=ja_JP.UTF-8 \
    # composer environment
    COMPOSER_ALLOW_SUPERUSER=1 \
    COMPOSER_HOME=/composer

# composer
COPY --from=composer:2.0.11 /usr/bin/composer /usr/bin/composer

# php conf
RUN { \
    echo 'short_open_tag = On'; \
    echo 'fastcgi.logging = 1'; \
    echo 'opcache.enable=1'; \
    echo 'opcache.optimization_level=0x7FFFBBFF' ; \
    echo 'opcache.revalidate_freq=0'; \
    echo 'opcache.validate_timestamps=1'; \
    echo 'opcache.memory_consumption=128'; \
    echo 'opcache.interned_strings_buffer=8'; \
    echo 'opcache.max_accelerated_files=4000'; \
    echo 'opcache.revalidate_freq=60'; \
    echo 'opcache.fast_shutdown=1'; \
    echo 'xdebug.remote_enable=1'; \
    echo 'post_max_size=20M'; \
    echo 'upload_max_filesize=20M'; \
    echo 'date.timezone=Asia/Tokyo'; \
    echo 'memory_limit=1024M'; \
    echo 'max_execution_time=60'; \
    echo 'date.expose_php = Off'; \
    } > /usr/local/etc/php/conf.d/overrides.ini
ADD ./docker/php-fpm/www.conf /usr/local/etc/php-fpm.d/www.conf

# WORKDIR
RUN mkdir -p /app
ADD . /app/
WORKDIR /app
RUN composer install

# env
RUN cp $ENVNAME .env
ENV DB_HOST=$DB_HOST
ENV MYSQL_ROOT_PASSWORD=$MYSQL_ROOT_PASSWORD
ENV MYSQL_DATABASE=$MYSQL_DATABASE
ENV MYSQL_USER=$MYSQL_USER
ENV MYSQL_PASSWORD=$MYSQL_PASSWORD

# RUN php artisan key:generate

RUN chmod 2775 /app
RUN chmod -R 775 /app
# RUN chmod -R 777 /app/storage && chmod -R  777 /app/bootstrap/cache
# RUN rm -f /app/storage/logs/laravel.log
# RUN rm -f /app/storage/logs/laravel-2*


EXPOSE 9000

CMD ["/usr/bin/supervisord"]
