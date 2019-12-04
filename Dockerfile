FROM php:7.4.0-zts
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
CMD tail -f /dev/null