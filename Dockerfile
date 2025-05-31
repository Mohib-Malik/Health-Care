# Step 1: Base image
FROM php:8.2-cli

# Step 2: System dependencies and PHP extensions
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    git \
    curl \
    libzip-dev \
    libpq-dev \
    && docker-php-ext-install pdo pdo_pgsql mbstring exif pcntl bcmath gd zip \
    && apt-get clean && rm -rf /var/lib/apt/lists/*


    # Step 3: Install Composer globally
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

#  Add this line
ENV COMPOSER_MEMORY_LIMIT=-1

# Step 4: Set working directory
WORKDIR /var/www

# Step 5: Copy project files
COPY . .

# Step 6: Install Composer dependencies (without interaction)
RUN composer install --no-interaction --prefer-dist --optimize-autoloader

# # Step 3: Install Composer globally
# COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# # Step 4: Set working directory
# WORKDIR /var/www

# # Step 5: Copy project files
# COPY . .

# # Step 6: Install Composer dependencies (without interaction)
# RUN composer install --no-interaction --prefer-dist --optimize-autoloader

# Step 7: Expose port
EXPOSE 10000

# Step 8: Start Laravel dev server
# CMD ["sh", "-c", "php artisan config:clear && php artisan key:generate && php artisan serve --host=0.0.0.0 --port=10000"]

CMD ["sh", "-c", "php artisan config:clear && php artisan key:generate && php artisan migrate --force && php artisan serve --host=0.0.0.0 --port=10000"]

