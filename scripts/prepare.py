import os
from os import chdir, getenv, system
from time import sleep

from mysql.connector import connect

mydb = None
host = getenv('MEDIAWIKI_DB_HOST', "mysqldb")
user = getenv('MEDIAWIKI_DB_USER', "root")
admin = getenv('MEDIAWIKI_ADMIN_PASSWORD', "changeme")
password = getenv('MEDIAWIKI_DB_PASSWORD', "changeme")
database = getenv('MEDIAWIKI_DB_NAME', "oearth")
hostname = getenv('WG_SERVER', "http://localhost")

while not mydb:
    try:
        mydb = connect(host=host, user=user, password=password)
    except Exception as e:
        mydb = None
        print(e)
        sleep(5)

mycursor = mydb.cursor()
mycursor.execute("SHOW DATABASES")

dbs = list([x[0] for x in mycursor])

html_path = "/var/www/html"

install_command = f'php maintenance/install.php --dbname={database} --dbserver={host} --dbuser={user} --dbpass={password} --server={hostname} --lang=en --pass={password} "Objective Earth" "Admin"'
add_int_admin = f'php maintenance/createAndPromote.php InternalAdmin {admin} --bureaucrat --sysop'
update_command = f'php maintenance/update.php'

chdir(html_path)

if not os.path.exists('captcha-images'):
    os.makedirs('captcha-images')

if database not in dbs:
    system("mv LocalSettings.php LocalSettings.php.bk || :")
    system(install_command)
    system(add_int_admin)
    system("mv LocalSettings.php.bk LocalSettings.php || :")

system(update_command)
