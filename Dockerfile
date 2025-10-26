# Étape 1 : image de base
FROM php:8.2-fpm

# Étape 2 : installation des dépendances système + Nginx + Node
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpq-dev \
    libzip-dev \
    unzip \
    nginx \
    nodejs \
    npm \
    && docker-php-ext-install pdo pdo_pgsql zip \
    && rm -rf /var/lib/apt/lists/*

# Étape 3 : installation de Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Étape 4 : configuration du projet
WORKDIR /var/www/html

# Copier tous les fichiers du projet
COPY . .

# Étape 5 : installation des dépendances PHP
RUN composer install --no-dev --optimize-autoloader

# ✅ Étape 6 : installation de Tailwind + build Vite
RUN npm install && npm run build

# Étape 7 : configuration Nginx
COPY nginx.conf /etc/nginx/sites-available/default

# Étape 8 : permissions (IMPORTANT pour les assets)
RUN chown -R www-data:www-data /var/www/html/storage \
    /var/www/html/bootstrap/cache \
    /var/www/html/public

# Rendre tous les fichiers du dossier public accessibles
RUN chmod -R 755 /var/www/html/public

# Exposer le port
EXPOSE 8080

# Script de démarrage
COPY start.sh /start.sh
RUN chmod +x /start.sh

CMD ["/start.sh"]
