FROM --platform=linux/amd64 php:8.3

RUN apt-get clean && apt-get update && apt-get install -y \
    git \
    curl \
    nginx \
    libzip-dev \
    zip \
    unzip

RUN docker-php-ext-install sockets zip
RUN curl -sS https://getcomposer.org/installer | php -- \
     --install-dir=/usr/local/bin --filename=composer

WORKDIR /app
COPY . /app

RUN composer install

EXPOSE 8001
