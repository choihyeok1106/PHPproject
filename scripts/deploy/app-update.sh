#!/usr/bin/env bash

cd /www/BackOffice
composer install --no-plugins --no-scripts
#composer update --no-plugins --no-scripts


if [ -d "./bootstrap/cache" ]
then
    chmod -R ug+rwx storage bootstrap/cache
else
    chmod -R ug+rwx storage
fi

if ! [ -f ".env" ]
then
    if [ -f "/var/local/pure-webserver.d/pure-bo.env" ]
    then
        cp /var/local/pure-webserver.d/pure-bo.env .env
    else
        cp .env.example .env
    fi

    chown www:www .env
    chmod 0644 .env

    php artisan key:generate
fi

