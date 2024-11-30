# Latest PHP image (at the time)
FROM php:8.3-apache

# Enable Apache mod_rewrite for clean URLs
RUN a2enmod rewrite

# Install PHP extensions required for MySQL
RUN apt update && apt upgrade -y
RUN apt-get install -y default-mysql-client

ADD --chmod=0755 https://github.com/mlocati/docker-php-extension-installer/releases/latest/download/install-php-extensions /usr/local/bin/
RUN install-php-extensions pdo_mysql-8.3


# Expose port 80 to be accessible from outside the container
EXPOSE 80

# Start Apache when the container starts
CMD ["apache2-foreground"]