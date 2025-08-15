#!/bin/bash
set -e

echo "Deployment started ..."

# Make sure deploy.sh itself is executable
chmod +x "$(dirname "$0")/deploy.sh"

# Optional: Turn ON Maintenance Mode
php artisan down || true

# Pull the latest version from Git
git pull origin main

# Install composer dependencies, ignoring platform requirements
export COMPOSER_ALLOW_SUPERUSER=1
composer install --optimize-autoloader --no-dev --no-interaction --ignore-platform-reqs

# Clear and rebuild cache
php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan view:clear
php artisan optimize

# Set root as owner, nobody as group
chown -R root:nobody storage bootstrap/cache
chmod -R 775 storage bootstrap/cache

# Ensure laravel.log exists
touch storage/logs/laravel.log
chown root:nobody storage/logs/laravel.log
chmod 664 storage/logs/laravel.log

# Make parent directories traversable
chmod o+x /home /home/coderbeans.shop /home/coderbeans.shop/public_html

# Optional: Turn OFF Maintenance Mode
php artisan up

echo "Deployment finished!"
