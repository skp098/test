#!/bin/bash

apt update && apt install python3-pip -y
pip install mysql-connector-python

cd /scripts

python3 prepare.py