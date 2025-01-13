# Use the official PrestaShop image as the base image
FROM prestashop/prestashop:1.7.8.11

WORKDIR /app

# Copy PrestaShop application files into the container
COPY ./prestashop/psdata /var/www/html
RUN rm -rf /var/www/html/install
RUN chmod 777 /var/www/html -R

# Copy MySQL dump files into the container
COPY ./prestashop/database-dump/dump.sql /tmp/dump.sql

# Copy SSL certificates and Apache config files into the container
COPY ./configuration/certs /etc/apache2/ssl
COPY ./configuration/ssl.conf /etc/apache2/sites-available/default-ssl.conf

# Install PHP Memcached extension and dependencies
RUN apt-get update && apt-get install -y \
    libmemcached-dev \
    zlib1g-dev \
    && pecl install memcached \
    && docker-php-ext-enable memcached \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*

# Copy the entrypoint script into the container
COPY ./scripts/entrypoint.sh /app/entrypoint.sh
RUN chmod +x /app/entrypoint.sh

ENTRYPOINT ["./entrypoint.sh"]