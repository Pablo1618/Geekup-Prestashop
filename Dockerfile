# Use the official PrestaShop image as the base image
FROM prestashop/prestashop:1.7.8.11

# Copy PrestaShop application files into the container
COPY prestashop/psdata /var/www/html
# Copy MySQL files into the container
#COPY prestashop/dbdata /var/lib/mysql

# Copy SSL certificates and Apache config files into the container
COPY configuration/certs /etc/apache2/ssl
COPY configuration/ssl.conf /etc/apache2/sites-available/default-ssl.conf

# Enable SSL and apply configuration
RUN echo 'ServerName localhost' >> /etc/apache2/apache2.conf && \
    a2enmod ssl && \
    a2ensite default-ssl

# Set the entrypoint command for Apache
CMD ["apache2-foreground"]