FROM php:8.2-cli

# Install system dependencies
RUN apt-get update && apt-get install -y --no-install-recommends \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    libfreetype6-dev \
    libjpeg-dev \
    libwebp-dev \
    zip \
    unzip \
    git \
    curl \
    libzip-dev \
    default-mysql-client \
    && docker-php-ext-configure gd --with-freetype --with-jpeg --with-webp \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd zip \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www

# Copy application files
COPY . .

# Install PHP dependencies
RUN composer install --no-interaction --prefer-dist --optimize-autoloader

# Generate Laravel app key and clear config
RUN php artisan key:generate && php artisan config:clear

# Expose port for Laravel's internal server
EXPOSE 10000

# Start Laravel dev server
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=10000"]
