#!/bin/bash

DOCKER_COMPOSE_PATH=".."

docker-compose -f $DOCKER_COMPOSE_PATH/docker-compose.yml up -d
