FROM php:8.2-apache-alpine

# Install mysqli extension
RUN docker-php-ext-install mysqli

# Copy source code to container
COPY . /var/www/html/

EXPOSE 80

CMD ["httpd-foreground"]
