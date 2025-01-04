#!/bin/bash

PRESTASHOP_PATH="../prestashop"
DOCKER_COMPOSE_PATH=".."

docker-compose -f $DOCKER_COMPOSE_PATH/docker-compose.yml down
sudo chown -R $USER:$USER $PRESTASHOP_PATH/dbdata
sudo chown -R $USER:$USER $PRESTASHOP_PATH/psdata