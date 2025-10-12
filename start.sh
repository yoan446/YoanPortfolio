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

# Vérifier le fichier .env
echo "=== Checking .env file ==="
if [ ! -f .env ]; then
    echo "❌ .env file not found! Creating from .env.example..."
    cp .env.example .env
fi

# Générer APP_KEY si manquant
if ! grep -q "APP_KEY=base64:" .env; then
    echo "Generating APP_KEY..."
    php artisan key:generate --force
fi

# Créer le lien storage
echo "Creating storage link..."
php artisan storage:link || echo "Storage link already exists"

# Clear et recréer les caches (IMPORTANT)
echo "Clearing caches..."
php artisan config:clear
php artisan route:clear
php artisan view:clear
php artisan cache:clear

# Optimisations Laravel (après avoir le .env)
echo "Optimizing Laravel..."
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Permissions finales
echo "Setting permissions..."
chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache /var/www/html/public
chmod -R 755 /var/www/html/public
chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

# Démarrer PHP-FPM en arrière-plan
echo "Starting PHP-FPM..."
php-fpm -D

# Attendre que PHP-FPM soit prêt
sleep 3

# Démarrer Nginx au premier plan
echo "Starting Nginx on port 8080..."
nginx -g "daemon off;"