FROM mediawiki:1.38

RUN apt update && apt install -y \
    wget python3-pip zip unzip libzip-dev && \
    docker-php-ext-install zip
RUN pip install mysql-connector-python requests
RUN wget -cO - https://getcomposer.org/composer-2.phar > composer.phar && \
    mv composer.phar /usr/local/bin/composer && \
    chmod a+x /usr/local/bin/composer

COPY ./media/logo.png /var/www/html/logo/logo.png
COPY ./configs/uploads.ini /usr/local/etc/php/conf.d/uploads.ini
COPY ./configs/LocalSettings.php /var/www/html/LocalSettings.php
COPY ./extensions /var/www/html/extensions

COPY ./scripts /scripts
