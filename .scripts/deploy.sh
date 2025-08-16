#!/bin/bash
set -e

echo "Deployment started ..."

# Make sure deploy.sh itself is executable
chmod +x "$(dirname "$0")/deploy.sh"

# Optional: Turn ON Maintenance Mode
# php artisan down || true

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
php artisan optimize:clear



# -----------------------------
# Permissions Fix (Safe)
# -----------------------------

PROJECT_PATH="/home/coderbeans.shop/public_html/furry-and-friends"

# Make parent directories traversable
chmod o+x /home /home/coderbeans.shop /home/coderbeans.shop/public_html

# Laravel writable folders
chown -R nobody:nogroup "$PROJECT_PATH/storage" "$PROJECT_PATH/bootstrap/cache"
chmod -R 777 "$PROJECT_PATH/storage" "$PROJECT_PATH/bootstrap/cache"


mkdir -p "$PROJECT_PATH/storage/framework/sessions"
chmod -R 777 "$PROJECT_PATH/storage/framework/sessions"
chown -R nobody:nogroup "$PROJECT_PATH/storage/framework/sessions"


# Ensure laravel.log exists
touch "$PROJECT_PATH/storage/logs/laravel.log"
# chmod 664 "$PROJECT_PATH/storage/logs/laravel.log"
chmod 777 "$PROJECT_PATH/storage/logs/laravel.log"
chown nobody:nogroup "$PROJECT_PATH/storage/logs/laravel.log"


# Make them writable
mkdir -p "$PROJECT_PATH/public/products"
mkdir -p "$PROJECT_PATH/public/product-variants"
mkdir -p "$PROJECT_PATH/public/variant-gallery"


# chmod -R 777 "$PROJECT_PATH/public/products"
# chmod -R 777 "$PROJECT_PATH/public/product-variants"
# chmod -R 777 "$PROJECT_PATH/public/variant-gallery"
# chown -R nobody:nogroup "$PROJECT_PATH/public/products"
# chown -R nobody:nogroup "$PROJECT_PATH/public/product-variants"
# chown -R nobody:nogroup "$PROJECT_PATH/public/variant-gallery"

# Make directories if they don't exist
mkdir -p "$PROJECT_PATH/public/products" \
         "$PROJECT_PATH/public/product-variants" \
         "$PROJECT_PATH/public/variant-gallery"

# Set owner to nobody (web server user)
chown -R nobody:nogroup "$PROJECT_PATH/public/products" \
                         "$PROJECT_PATH/public/product-variants" \
                         "$PROJECT_PATH/public/variant-gallery"

# Set safe writable permissions
chmod -R 777 "$PROJECT_PATH/public/products" \
              "$PROJECT_PATH/public/product-variants" \
              "$PROJECT_PATH/public/variant-gallery"
# -----------------------------
# End Permissions Fix
# -----------------------------

# Optional: Turn OFF Maintenance Mode
php artisan up

echo "Deployment finished!"
