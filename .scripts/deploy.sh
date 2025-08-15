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



# -----------------------------
# Permissions Fix (Safe)
# -----------------------------

PROJECT_PATH="/home/coderbeans.shop/public_html/furry-and-friends"

# Make parent directories traversable
chmod o+x /home /home/coderbeans.shop /home/coderbeans.shop/public_html

# Laravel writable folders
chown -R root:nogroup "$PROJECT_PATH/storage" "$PROJECT_PATH/bootstrap/cache"
chmod -R 777 "$PROJECT_PATH/storage" "$PROJECT_PATH/bootstrap/cache"

# Ensure laravel.log exists
touch "$PROJECT_PATH/storage/logs/laravel.log"
chmod 664 "$PROJECT_PATH/storage/logs/laravel.log"

# -----------------------------
# End Permissions Fix
# -----------------------------

# Optional: Turn OFF Maintenance Mode
php artisan up

echo "Deployment finished!"
