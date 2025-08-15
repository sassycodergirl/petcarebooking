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
# Permissions Fix (Working Method)
# -----------------------------

cd /home/coderbeans.shop/public_html/furry-and-friends

# 1️⃣ Parent directories must be traversable by web server
chmod o+x /home
chmod o+x /home/coderbeans.shop
chmod o+x /home/coderbeans.shop/public_html

# 2️⃣ Ensure project is owned by root
chown -R root:root .

# 3️⃣ Laravel writable folders
chmod -R 777 storage bootstrap/cache    # fully writable for all users
touch storage/logs/laravel.log
chmod 664 storage/logs/laravel.log

# -----------------------------
# End Permissions Fix
# -----------------------------

# Optional: Turn OFF Maintenance Mode
php artisan up

echo "Deployment finished!"
