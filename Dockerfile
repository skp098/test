FROM mediawiki:1.38

RUN apt update && apt install -y \
    wget python3-pip zip unzip libzip-dev && \
    docker-php-ext-install zip && \
    apt install -y vim
RUN pip install mysql-connector-python requests
RUN wget -cO - https://getcomposer.org/composer-2.phar > composer.phar && \
    mv composer.phar /usr/local/bin/composer && \
    chmod a+x /usr/local/bin/composer

WORKDIR /var/www/html

COPY ./extensions /var/www/html/extensions
RUN cp composer.local.json-sample composer.local.json && \
    rm -f composer.lock  && \
    composer install --no-dev 

COPY ./configs/uploads.ini /usr/local/etc/php/conf.d/uploads.ini
COPY ./media/logo.png /var/www/html/logo/logo.png
COPY ./media/logo.png /var/www/html/media/logo.png
COPY ./media/donation-heart.png /var/www/html/media/donation-heart.png
COPY ./media/donation-info.png /var/www/html/media/donation-info.png
COPY ./configs/LocalSettings.php /var/www/html/LocalSettings.php

RUN apt-get update && apt install lua5.1
RUN chmod 755 extensions/Scribunto/includes/engines/LuaStandalone/binaries/lua5_1_5_linux_64_generic/lua

WORKDIR /var/www/html/extensions/MW-OAuth2Client/vendors/oauth2-client
RUN composer install -n
WORKDIR /var/www/html

COPY ./scripts /scripts