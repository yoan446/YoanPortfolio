#!/bin/bash
set -e

echo "Starting Laravel application..."

# Debug : Vérifier les fichiers publics
echo "=== Checking public folder ==="
ls -la /var/www/html/public/
echo "=== Checking CSS folder ==="
ls -la /var/www/html/public/css/ || echo "❌ CSS folder not found!"
echo "=== Checking JS folder ==="
ls -la /var/www/html/public/js/ || echo "❌ JS folder not found!"
echo "=== Checking image folder ==="
ls -la /var/www/html/public/image/ || echo "❌ Image folder not found!"

# Créer le lien storage si nécessaire
php artisan storage:link || echo "Storage link already exists"

# Permissions
chown -R www-data:www-data /var/www/html/public
chmod -R 755 /var/www/html/public

# Démarrer PHP-FPM en arrière-plan
echo "Starting PHP-FPM..."
php-fpm -D

# Attendre que PHP-FPM soit prêt
sleep 2

# Démarrer Nginx au premier plan
echo "Starting Nginx..."
nginx -g "daemon off;"