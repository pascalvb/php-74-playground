FROM php:7.4.0-zts
RUN apt-get update && \
    apt-get install -y --no-install-recommends git zip
RUN curl --silent --show-error https://getcomposer.org/installer | php
RUN mv /composer.phar /usr/local/bin/composer && chmod a+x /usr/local/bin/composer

CMD tail -f /dev/null