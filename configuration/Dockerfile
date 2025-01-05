# Use the official PrestaShop image as the base image
FROM prestashop/prestashop:1.7.8.11

WORKDIR /app

# Copy PrestaShop application files into the container
COPY ./prestashop/psdata /var/www/html

# Copy MySQL dump files into the container
COPY ./prestashop/database-dump/dump.sql /tmp/dump.sql

# Copy SSL certificates and Apache config files into the container
COPY ./configuration/certs /etc/apache2/ssl
COPY ./configuration/ssl.conf /etc/apache2/sites-available/default-ssl.conf

COPY ./scripts/entrypoint.sh /app/entrypoint.sh
RUN chmod +x /app/entrypoint.sh

ENTRYPOINT ["./entrypoint.sh"]