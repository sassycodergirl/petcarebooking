#!/bin/bash
set -e

echo "Deployment started ..."

# Turn ON Maintenance Mode (optional)
(php artisan down) || true

# Pull the latest version of the app
git pull origin main

# Install composer dependencies
composer install --optimize-autoloader --no-dev --no-interaction --ignore-platform-reqs

# Clear and rebuild cache
php artisan cache:clear
php artisan config:clear
php artisan optimize

# Fix permissions for storage and bootstrap/cache
chown -R www-data:www-data /home/coderbeans.shop/public_html/furry-and-friends/storage
chown -R www-data:www-data /home/coderbeans.shop/public_html/furry-and-friends/bootstrap/cache
chmod -R 775 /home/coderbeans.shop/public_html/furry-and-friends/storage
chmod -R 775 /home/coderbeans.shop/public_html/furry-and-friends/bootstrap/cache

# Turn OFF Maintenance mode
php artisan up

echo "Deployment finished!"
