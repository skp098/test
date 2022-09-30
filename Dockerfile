FROM mediawiki:1.38

COPY ./uploads.ini /usr/local/etc/php/conf.d/uploads.ini
COPY ./LocalSettings.php /var/www/html/LocalSettings.php
COPY ./extensions /var/www/html/extensions
COPY ./logo /var/www/html/logo

COPY ./scripts /scripts
