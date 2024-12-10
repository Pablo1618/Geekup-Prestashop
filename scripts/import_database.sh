#!/bin/bash

echo -e "\e[1;37m > Importing database...\e[0m"
if docker exec -i some-mysql mysql -u root -p"admin" < "$PWD/../prestashop/database-dump/dump.sql"; then
    echo -e "\e[1;37;42m > Database imported successfully.\e[0m"
else
    echo -e "\e[1;37;41m > Failed to import database.\e[0m"
fi