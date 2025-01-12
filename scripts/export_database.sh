#!/bin/bash

# Set colors for output
RESET="\e[0m"
INFO="\e[1;37m"
SUCCESS="\e[1;37;42m"
ERROR="\e[1;37;41m"

MYSQL_CONTAINER="some-mysql"
PRESTASHOP_CONTAINER="prestashop"

PS_DOMAIN=$(docker exec "$PRESTASHOP_CONTAINER" printenv PS_DOMAIN)
PS_SSL_DOMAIN=$(docker exec "$PRESTASHOP_CONTAINER" printenv PS_SSL_DOMAIN)

if [[ -z "$PS_DOMAIN" || -z "$PS_SSL_DOMAIN" ]]; then
    echo -e "${ERROR} > Failed to retrieve PS_DOMAIN or PS_SSL_DOMAIN from the PrestaShop container.${RESET}"
    exit 1
fi

echo -e "${INFO} > Exporting database...${RESET}"
DUMP_PATH="../prestashop/database-dump/dump.sql"
if docker exec "$MYSQL_CONTAINER" mysqldump -u root -p"admin" --all-databases > "$DUMP_PATH"; then
    sed -i -e "s|$PS_DOMAIN|\$PS_DOMAIN|g" -e "s|$PS_SSL_DOMAIN|\$PS_SSL_DOMAIN|g" "$DUMP_PATH"
    echo -e "${SUCCESS} > Database exported successfully to: $DUMP_PATH${RESET}"
else
    echo -e "${ERROR} > Failed to export database.${RESET}"
fi