#!/bin/bash

DB_NAME="prestashop
DB_USER="root" 
DB_PASSWORD="admin" 
DB_CONTAINER_NAME="some-mysql"

echo "Connecting to database '$DB_NAME' in container '$DB_CONTAINER_NAME'..."
docker exec -i $DB_CONTAINER_NAME mysql -u$DB_USER -p$DB_PASSWORD -e "USE $DB_NAME; SHOW TABLES;"

if [ $? -eq 0 ]; then
    echo "Tables in database '$DB_NAME' displayed successfully."
else
    echo "Failed to display tables. Please check your settings."
fi
