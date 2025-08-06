# Use official PHP image with Apache
FROM php:8.2-apache

# Install PHP extensions for MySQL (optional)
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Enable Apache mod_rewrite (optional, useful for frameworks like Laravel)
RUN a2enmod rewrite

# Copy project files into the container
COPY . /var/www/html/

# Set permissions (optional but helpful)
RUN chown -R www-data:www-data /var/www/html

# Expose port 80 (Apache default)
EXPOSE 80
