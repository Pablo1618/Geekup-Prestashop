#!/bin/bash

PRESTASHOP_PATH="../prestashop"
DOCKER_COMPOSE_PATH=".."

echo -e "\e[1;37m > Starting Docker Compose for the first time to create folder dbdata...\e[0m"
docker-compose -f $DOCKER_COMPOSE_PATH/docker-compose.yml up -d

echo -e "\e[1;37m > Waiting for MySQL to be ready...\e[0m"
until docker exec some-mysql mysql -u root -p"admin" -e "SELECT 1" >/dev/null 2>&1; do
    sleep 2
done

echo -e "\e[1;37m > Stopping containers to set permissions...\e[0m"
docker-compose -f $DOCKER_COMPOSE_PATH/docker-compose.yml down

echo -e "\e[1;37m > Setting permissions for dbdata and psdata...\e[0m"
if ! [[ $(stat -c "%A" $PRESTASHOP_PATH/dbdata) =~ "-rw.rw.rw." ]]; then 
    sudo chmod -R a+rw $PRESTASHOP_PATH/dbdata
echo -e "\e[1;37m > Changed permissions for dbdata \e[0m"
fi
if ! [[ $(stat -c "%A" $PRESTASHOP_PATH/psdata) =~ "-rw.rw.rw." ]]; then 
    sudo chmod -R a+rw $PRESTASHOP_PATH/psdata
echo -e "\e[1;37m > Changed permissions for psdata \e[0m"
fi

echo -e "\e[1;37m > Restarting Docker Compose...\e[0m"
docker-compose -f $DOCKER_COMPOSE_PATH/docker-compose.yml up -d

echo -e "\e[1;37m > Waiting for MySQL to be ready again...\e[0m"
until docker exec some-mysql mysql -u root -p"admin" -e "SELECT 1" >/dev/null 2>&1; do
    sleep 2
done

echo -e "\e[1;37m > Importing database...\e[0m"
if docker exec -i some-mysql mysql -u root -p"admin" < "$PWD/../prestashop/database-dump/dump.sql"; then
    echo -e "\e[1;37;42m > Database imported successfully.\e[0m"
else
    echo -e "\e[1;37;41m > Failed to import database.\e[0m"
fi
