# MediaWiki

MediaWiki is a free and open-source wiki software package written in PHP. It
serves as the platform for Wikipedia and the other Wikimedia projects.

MediaWiki is:

* feature-rich and extensible, both on-wiki and with hundreds of extensions;
 
The CREDITS file lists technical contributors to the project. The COPYING file explains
MediaWiki's copyright and license (GNU General Public License, version 2 or
later).

## Extensions in use for OE

* Cargo 3.1
* PageForms
* BreadCrumbs2
* Upvote (Customised for OE could be pulled from Extensions group)
* Comments (Customised for OE could be pulled from Extensions group)


## Current Deployment

Current deployment is defined by docker-compose.yml. The database (Mysql) is managed through GCP. But for someone who wants to run the system locally and setup a local database the following code could be added in you docker.yml file:


```
# DB Config
  database:
    image: mysql:8.0.29
    restart: always
    networks:
      - webapp
    environment:
      MYSQL_DATABASE: wiki_db
      MYSQL_ROOT_PASSWORD: root
      MYSQL_USER: wikimedia
      MYSQL_PASSWORD: wikimedia
    volumes:
      - /var/lib/mysql

  # phpmyadmin
  phpmyadmin:
    depends_on:
      - database
    image: phpmyadmin/phpmyadmin
    restart: always
    ports:
      - '8000:80'
    environment:
      PMA_HOST: database
      MYSQL_ROOT_PASSWORD: root
      UPLOAD_LIMIT: 64M
    networks:
      - webapp  
```

Using the above config you can have your MySQL database up and running and also you can access that using phpmyadmin.

## Skin in use

Vector is the default skin in use. The legacy feature is currently commented out.
