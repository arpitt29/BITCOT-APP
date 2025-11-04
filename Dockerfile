# Dockerfile (alpine minimal)
FROM php:8.2-alpine

WORKDIR /app

# install mysqli dependencies then the PHP extension
RUN apk add --no-cache ${PHPIZE_DEPS} mysql-client && \
    docker-php-ext-install mysqli

# copy app files
COPY . /app

# ensure permissions
RUN chown -R www-data:www-data /app

EXPOSE 8000

# run built-in PHP server (suitable for small app)
CMD ["php", "-S", "0.0.0.0:8000", "-t", "/app"]
