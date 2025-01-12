#!/bin/bash

set -e

# wait for MySQL to be ready
echo -e "\e[1;37m > Waiting for MySQL to be ready...\e[0m"
until mysqladmin ping -h $DB_SERVER -u root --password=$DB_PASSWD; do
    sleep 1
done
echo -e "\e[1;37;42m > MySQL is ready.\e[0m"

# import database
echo -e "\e[1;37m > Importing database...\e[0m"
sed -i -e "s|\$PS_DOMAIN|$PS_DOMAIN|g" -e "s|\$PS_SSL_DOMAIN|$PS_SSL_DOMAIN|g" /tmp/dump.sql
if mysql -u root -p"$DB_PASSWD" -h $DB_SERVER < /tmp/dump.sql; then
    echo -e "\e[1;37;42m > Database imported successfully.\e[0m"
else
    echo -e "\e[1;37;41m > Failed to import database.\e[0m"
fi

# Enable SSL and apply configuration
echo 'ServerName localhost' >> /etc/apache2/apache2.conf
a2enmod ssl
a2ensite default-ssl
apache2-foreground
