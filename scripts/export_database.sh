#!/bin/bash

MYSQL_CONTAINER="some-mysql"
PRESTASHOP_CONTAINER="prestashop"

PS_DOMAIN=$(docker exec "$PRESTASHOP_CONTAINER" printenv PS_DOMAIN)
PS_SSL_DOMAIN=$(docker exec "$PRESTASHOP_CONTAINER" printenv PS_SSL_DOMAIN)

if [[ -z "$PS_DOMAIN" || -z "$PS_SSL_DOMAIN" ]]; then
    echo -e "${ERROR} > Failed to retrieve PS_DOMAIN or PS_SSL_DOMAIN from the PrestaShop container.${RESET}"
    exit 1
fi

echo -e "\e[1;37m > Exporting database...\e[0m"
DUMP_PATH="$PWD/../prestashop/database-dump/dump.sql"
if docker exec "$MYSQL_CONTAINER" mysqldump -u root -p"admin" --all-databases > "$DUMP_PATH"; then
    sed -i -e "s|$PS_DOMAIN|\$PS_DOMAIN|g" -e "s|$PS_SSL_DOMAIN|\$PS_SSL_DOMAIN|g" "$DUMP_PATH"
    echo -e "\e[1;37;42m > Database exported successfully to: $DUMP_PATH\e[0m"
else
    echo -e "\e[1;37;41m > Failed to export database.\e[0m"
fi