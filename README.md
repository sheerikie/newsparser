PARSER README
========================


# News Parser using PHP 7.4 Symfony 5.4, MySQL, RabbitMQ, Nginx Docker

## This is full stack Symfony 5.4 into Docker containers using docker-compose.

It is composed by 5 containers:

- php - the PHP-FPM container with the 7.4 version of PHP.
- database - which is the MySQL database container with a MySQL 8.0 image.
- RabbitMQ for running parallel tasks
- symfony_docker_app_sync to sync files using library docker-sync .
- CRON container

## How to run

1. Clone the repository
2. cd inside the project folder
4. You should work inside the php container. 
5. Inside the php container, run composer install to install dependencies from /var/www/project folder.[`docker-compose exec container_id bash`]



## How to fetch the news

There is a command for fetching news from parsed.json file(acting like the api call) : symfony console parseNews:fetch