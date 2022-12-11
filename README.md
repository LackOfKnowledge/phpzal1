# Prerequisites

1. Docker & docker-compose

# Installation

1. Clone this project.
2. Enter cloned directory e.g. ```cd 01-hello-docker```.
3. Enter docker subdirectory: ```cd docker```
4. Run ```docker-compose up -d```
5. Enter php container: ```docker-compose exec php bash```
6. Download composer into project: ```curl -sS https://getcomposer.org/installer | php```
7. Run ```./composer.phar install```
8. Exit php container: ```exit```

# Launching project

1. Run ```docker-compose up -d```

# Stopping project

1. Run ```docker-compose down```
