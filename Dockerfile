# Latest PHP image (at the time)
FROM php:8.3-apache

# Enable Apache mod_rewrite for clean URLs
RUN a2enmod rewrite

# Install PHP extensions required for MySQL
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Expose port 80 to be accessible from outside the container
EXPOSE 80

# Start Apache when the container starts
CMD ["apache2-foreground"]