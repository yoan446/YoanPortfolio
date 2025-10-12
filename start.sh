#!/bin/bash
set -e

echo "Starting Laravel application..."

# Migrations (optionnel, à activer si nécessaire)
php artisan migrate --force

# Démarrer PHP-FPM en arrière-plan
echo "Starting PHP-FPM..."
php-fpm -D

# Attendre que PHP-FPM soit prêt
sleep 2

# Démarrer Nginx au premier plan
echo "Starting Nginx..."
nginx -g "daemon off;"