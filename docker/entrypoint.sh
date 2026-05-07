#!/bin/bash
set -e

echo "Waiting for MySQL..."
until mysqladmin ping -h"mysql" -u"sipus" -p"password" --silent; do
    echo 'waiting for mysql...'
    sleep 1
done

echo "Running migrations..."
php artisan migrate --force

echo "Running seeders..."
php artisan db:seed --force

echo "Creating symbolic link for storage..."
php artisan storage:link

echo "Clearing cache..."
php artisan cache:clear
php artisan config:clear
php artisan route:clear

echo "Setting permissions..."
chown -R www-data:www-data /app/storage
chown -R www-data:www-data /app/bootstrap/cache

echo "Starting application..."
exec "$@"
