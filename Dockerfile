FROM mediawiki:1.38

RUN apt update && apt install -y \
    wget python3-pip zip unzip libzip-dev && \
    docker-php-ext-install zip
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
COPY ./configs/LocalSettings.php /var/www/html/LocalSettings.php
RUN apt-get update && apt install lua5.1
RUN chmod 755 extensions/Scribunto/includes/engines/LuaStandalone/binaries/lua5_1_5_linux_64_generic/lua
RUN chcon -t httpd_sys_script_exec_t extensions/Scribunto/includes/Engines/LuaStandalone/binaries/lua5_1_5_linux_64_generic/lua
COPY ./scripts /scripts