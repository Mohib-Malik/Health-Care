FROM php:8.2-cli

# System deps
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    git \
    curl \
    libzip-dev \
    mysql-client \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd zip

# Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# App source
WORKDIR /var/www
COPY . .

RUN composer install
RUN php artisan key:generate
RUN php artisan config:clear

CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=10000"]
