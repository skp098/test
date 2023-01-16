#!/bin/bash

cd /var/www/html

cp composer.local.json-sample composer.local.json
rm -f composer.lock
composer install --no-dev

cd /scripts

python3 prepare.py

cd /scripts

python3 import.py &

apache2-foreground

wait