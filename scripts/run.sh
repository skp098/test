#!/bin/bash

cd /scripts

python3 prepare.py

cd /scripts

python3 import.py &

exec apache2-foreground

wait
