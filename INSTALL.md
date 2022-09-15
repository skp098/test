## Installation Guide For OE

[Objective.Earth](https://www.objective.earth/) is build on top of [MediaWiki](https://www.mediawiki.org/wiki/MediaWiki). To enhance the default functionality of MediaWiki some extension and custom develpment have been used. The project repo for Objective.Earth could be found [here](https://gitlab.com/objective-earth/objective-earth-wiki). Most of the custom development have been done for extensions only. 

## Prerequisites

- [Docker](https://docs.docker.com/engine/install/)

## Installation

The installation process can be simplified into the following steps:

1. Cloning the repo
2. Running the docker application
3. Setting up MediaWiki and LocalSetting.php
4. Running the Database update file
5. Importing all the templates
6. Creating tables from the templates
7. Start Contributing :)

#### 1. Cloning the repo

Clone the repo using following command

```
$ git clone https://gitlab.com/objective-earth/objective-earth-wiki.git
```
Fetch all the submodules using:

```
$ git submodule update --init --recursive
```

#### 2. Running the docker application

Goto the 'objective-earth-wiki' which contains docker-compose.yml file. This file contains all the required containers need to run the application. Run the following command to start the entire application:

```
$ docker-compose up
```

You could now find the application running on localhost port 8080. You can access it through http://localhost:8080. 

#### 3. Setting up MediaWiki and LocalSetting.php

Head over to the link and setup your MediaWiki using the credentials available in Enviornment Variables of docker-compose.yml file.

At last download the LocalSettings.php file and place it at the root directory. Once done comment out the Volume created for the LocalSettings.php

Add the support for the following extensions in your LocalSettings.php

```
wfLoadExtension( 'Cargo' );
wfLoadExtension( 'mediawiki-extensions-PageForms' );
wfLoadExtension( 'Upvote' );
wfLoadExtension( 'Comments' );
```

Stop all your containers and run again your docker-compose.yml. 

#### 4. Running the Database update file

Goto your container running the mediawiki service. This could be done using the following commands.

View all the container running and copy the container id running the MediaWiki Server.

```
$ docker container ls
```
run the following command to get into terminal of the that MediaWiki container

```
$ docker exec -it -u root <MW_CONTAINER_ID> bash
```

now run the following command inside the interective terminal of MW:

```
cd maintenance
php update.php
```

This command will create all the necessary data table for cargo and comments.


#### 5. Importing all the templates

Download the xml file from here which contains all the required templates. Navigate to Special:Import of your local setup and import file. All the temples will be availabe in one go.


#### 6. Creating tables from the templates

You can now goto each template and click on the 'recreate data' tab. Which will create all the required for the template.

#### 7. Start Contributing :)

Congrats you have setup the project on you local. You may now refer to the [CONTRIBUTING.md](https://gitlab.com/objective-earth/objective-earth-wiki/-/blob/master/CONTRIBUTING.md) for the guidelines of contributing to Objective.Earth