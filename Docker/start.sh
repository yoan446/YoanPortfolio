#!/bin/bash

echo "🚀 Démarrage de l'application Laravel..."

# Configurer le port pour Render (par défaut 80 si $PORT n'est pas défini)
export PORT=${PORT:-80}
echo "📡 Configuration du port: $PORT"

# Remplacer ${PORT} dans la config Nginx
envsubst '${PORT}' < /etc/nginx/sites-available/default > /etc/nginx/sites-available/default.tmp
mv /etc/nginx/sites-available/default.tmp /etc/nginx/sites-available/default

# Définir les permissions correctes
chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache
chmod -R 775 /var/www/storage /var/www/bootstrap/cache

# Attendre que la base de données soit disponible
echo "⏳ Attente de la base de données PostgreSQL..."
max_attempts=30
attempt=0

until php artisan migrate:status 2>/dev/null || [ $attempt -eq $max_attempts ]; do
  attempt=$((attempt + 1))
  echo "Tentative $attempt/$max_attempts - Base de données non disponible, nouvelle tentative dans 2 secondes..."
  sleep 2
done

if [ $attempt -eq $max_attempts ]; then
  echo "❌ Impossible de se connecter à la base de données après $max_attempts tentatives"
  echo "⚠️  L'application va démarrer mais risque de ne pas fonctionner correctement"
else
  echo "✅ Base de données PostgreSQL connectée!"
  
  # Exécuter les migrations automatiquement
  echo "🔄 Exécution des migrations..."
  php artisan migrate --force
  
  # Optionnel : Exécuter les seeders si nécessaire
  # php artisan db:seed --force
fi

# Nettoyer et optimiser le cache pour la production
echo "🧹 Nettoyage du cache..."
php artisan config:clear
php artisan cache:clear
php artisan view:clear
php artisan route:clear

echo "⚡ Optimisation pour la production..."
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Créer un lien symbolique pour le storage si nécessaire
if [ ! -L /var/www/public/storage ]; then
  php artisan storage:link
fi

# Démarrer PHP-FPM et Nginx avec Supervisor
echo "✨ Démarrage de PHP-FPM et Nginx..."
/usr/bin/supervisord -c /etc/supervisor/conf.d/supervisord.conf