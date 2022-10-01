#!/bin/bash

apt update && apt install python3-pip -y
pip install mysql-connector-python requests

cd /scripts

python3 prepare.py

cd /scripts

python3 import.py &

apache2-foreground

wait