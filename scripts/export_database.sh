#!/bin/bash

echo -e "\e[1;37m > Exporting database...\e[0m"
DUMP_PATH="$PWD/../prestashop/database-dump/dump.sql"
if docker exec some-mysql mysqldump -u root -p"admin" --all-databases > "$DUMP_PATH"; then
    echo -e "\e[1;37;42m > Database exported successfully to: $DUMP_PATH\e[0m"
else
    echo -e "\e[1;37;41m > Failed to export database.\e[0m"
fi