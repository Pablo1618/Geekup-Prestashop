#!/bin/bash

chmod 777 /var/www/html -R

# import database
echo -e "\e[1;37m > Importing database...\e[0m"
if mysql -u root -p"admin" -h $DB_SERVER < /tmp/dump.sql; then
    echo -e "\e[1;37;42m > Database imported successfully.\e[0m"
else
    echo -e "\e[1;37;41m > Failed to import database.\e[0m"
fi

# Enable SSL and apply configuration
echo 'ServerName localhost' >> /etc/apache2/apache2.conf
a2enmod ssl
a2ensite default-ssl
apache2-foreground
