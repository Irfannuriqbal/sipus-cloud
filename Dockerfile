# Multi-stage build for Laravel application
FROM php:8.3-fpm AS builder

# Set working directory
WORKDIR /app

# Install system dependencies
RUN apt-get update && apt-get install -y \
    build-essential \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libzip-dev \
    git \
    curl \
    && rm -rf /var/lib/apt/lists/*

# Install PHP extensions
RUN docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) gd zip mysqli pdo pdo_mysql

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copy composer files
COPY composer.json composer.lock ./

# Install PHP dependencies
RUN composer install --no-dev --optimize-autoloader

# Copy application files
COPY . .

# Generate app key
RUN php artisan key:generate

# Production stage
FROM php:8.3-fpm

WORKDIR /app

# Install runtime dependencies
RUN apt-get update && apt-get install -y \
    libpng6 \
    libjpeg62-turbo \
    libfreetype6 \
    libzip4 \
    nginx \
    supervisor \
    && rm -rf /var/lib/apt/lists/*

# Install PHP extensions
RUN docker-php-ext-install -j$(nproc) gd zip mysqli pdo pdo_mysql

# Copy from builder
COPY --from=builder /app /app

# Copy nginx configuration
COPY docker/nginx.conf /etc/nginx/sites-available/default

# Copy supervisor configuration
COPY docker/supervisor.conf /etc/supervisor/conf.d/supervisord.conf

# Create necessary directories
RUN mkdir -p /app/storage/logs \
    && mkdir -p /app/storage/app/public/pengajuan/ktp \
    && mkdir -p /app/storage/app/public/pengajuan/kk \
    && mkdir -p /app/storage/app/public/pengajuan/surat \
    && chown -R www-data:www-data /app/storage \
    && chown -R www-data:www-data /app/bootstrap/cache

# Copy entrypoint script
COPY docker/entrypoint.sh /usr/local/bin/entrypoint.sh
RUN chmod +x /usr/local/bin/entrypoint.sh

EXPOSE 80

ENTRYPOINT ["/usr/local/bin/entrypoint.sh"]
CMD ["/usr/bin/supervisord", "-c", "/etc/supervisor/conf.d/supervisord.conf"]
