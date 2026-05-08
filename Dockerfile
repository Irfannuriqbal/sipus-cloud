# =========================
# BUILD STAGE
# =========================
FROM php:8.5-fpm AS builder

WORKDIR /app

# Install system dependencies + Node.js
RUN apt-get update && apt-get install -y \
    build-essential \
    pkg-config \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libzip-dev \
    libonig-dev \
    zip \
    unzip \
    git \
    curl \
    nginx \
    supervisor \
    gnupg \
    && curl -fsSL https://deb.nodesource.com/setup_20.x | bash - \
    && apt-get install -y nodejs \
    && rm -rf /var/lib/apt/lists/*

# Install PHP extensions
RUN docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install \
    pdo \
    pdo_mysql \
    mbstring \
    exif \
    pcntl \
    bcmath \
    gd \
    zip

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copy Laravel files
COPY . .

# Install PHP dependencies
RUN composer install --no-dev --optimize-autoloader

# Install Node dependencies
RUN npm install

# Build Vite assets
RUN npm run build

# Laravel optimization
RUN php artisan config:clear || true
RUN php artisan cache:clear || true
RUN php artisan view:clear || true
RUN php artisan route:clear || true

# =========================
# PRODUCTION STAGE
# =========================
FROM php:8.5-fpm

WORKDIR /var/www/html

# Install runtime dependencies
RUN apt-get update && apt-get install -y \
    nginx \
    supervisor \
    build-essential \
    pkg-config \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libzip-dev \
    libonig-dev \
    zip \
    unzip \
    && rm -rf /var/lib/apt/lists/*

# Install PHP extensions
RUN docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install \
    pdo \
    pdo_mysql \
    mbstring \
    exif \
    pcntl \
    bcmath \
    gd \
    zip

# Copy app from builder
COPY --from=builder /app /var/www/html

# Set permissions
RUN chown -R www-data:www-data /var/www/html/storage
RUN chown -R www-data:www-data /var/www/html/bootstrap/cache

# Refresh Laravel config cache safely
RUN php artisan config:clear || true
RUN php artisan cache:clear || true
RUN php artisan config:cache || true

# Expose port
EXPOSE 80

# Run Laravel
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=80"]