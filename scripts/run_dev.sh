#!/bin/bash

PRESTASHOP_PATH="../prestashop"
DOCKER_COMPOSE_PATH=".."

# Uprawnienia
if ! [[ $(stat -c "%A" $PRESTASHOP_PATH/dbdata) =~ "-rw.rw.rw." ]]; then 
    sudo chmod -R a+rw $PRESTASHOP_PATH/dbdata
    echo "### Changed permissions for dbdata"
fi
if ! [[ $(stat -c "%A" $PRESTASHOP_PATH/psdata) =~ "-rw.rw.rw." ]]; then 
    sudo chmod -R a+rw $PRESTASHOP_PATH/psdata
    echo "### Changed permissions for psdata"
fi

# Start dockera
DETACHED=""
if [ "$1" == "-d" ]; then DETACHED="-d"; fi
docker-compose -f $DOCKER_COMPOSE_PATH/docker-compose.dev.yml up -d
