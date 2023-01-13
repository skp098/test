## Installing Objective Earth in you local system,

This document gives the instructions to install Objective Earth on your local machine. The Guide serves two purpose of installation one is for developers who wants to make contribution to Objective Earth and other for whom who just want to clone and run the same on the local system.


### Installation for Developers

1. Setup [docker](https://docs.docker.com/get-started/) on your machine.
2. Clone the repository.
3. Run the following command to fetch all the extensions:
    - git submodule update --init --recursive
4. Run the follwong command to start docker services:
    - docker-compose-local.yml
5. To connect to MySQL databse use any of the following config:
    - host:database, DB:wiki_db, user:wikimedia, password:root/wikimedia
    - host:database:3306, DB:wiki_db, user:wikimedia, password:root/wikimedia
    - host:localhost, DB:wiki_db, user:wikimedia, password:root/wikimedia
6. Download the LocalSettings.php and place at the root of the repo folder.
7. Now edit the docker-compose-local.yml file and uncomment the line which mount the LocalSettings.php
8. Stop your containers and run them again
    - docker stop $(docker ps -q) // to stop the containers
    - docker-compose-local.yml // to run again the containers
9. 


