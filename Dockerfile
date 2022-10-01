FROM mediawiki:1.38

COPY ./media/logo.png /var/www/html/logo/logo.png
COPY ./configs/uploads.ini /usr/local/etc/php/conf.d/uploads.ini
COPY ./configs/LocalSettings.php /var/www/html/LocalSettings.php
COPY ./extensions /var/www/html/extensions

COPY ./scripts /scripts
