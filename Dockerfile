# Use a minimal Alpine base
FROM alpine:3.20

# Install Apache, PHP, and PHP extensions
RUN apk add --no-cache \
    apache2 \
    php82 \
    php82-apache2 \
    php82-mysqli \
    php82-pdo_mysql \
    php82-session \
    php82-openssl \
    php82-json \
    php82-mbstring \
    php82-curl \
    php82-dom \
    php82-tokenizer \
    php82-fileinfo \
    apache2-utils \
    && mkdir -p /run/apache2 \
    && sed -i 's#/var/www/localhost/htdocs#/var/www/html#g' /etc/apache2/httpd.conf

# Set working directory
WORKDIR /var/www/html

# Copy application code into container
COPY . /var/www/html

# Expose Apache port
EXPOSE 80

# Start Apache in foreground
CMD ["/usr/sbin/httpd", "-D", "FOREGROUND"]
