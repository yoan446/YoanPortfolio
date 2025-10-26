# Étape 1 : image de base PHP + Nginx
FROM php:8.2-fpm

# Étape 2 : installation des dépendances système
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

# Étape 3 : Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Étape 4 : Configuration du projet
WORKDIR /var/www/html

# Copier le code du projet
COPY . .

# Étape 5 : Installer dépendances PHP
RUN composer install --no-dev --optimize-autoloader

# ✅ Étape 6 : reconstruire le frontend pour Linux
RUN rm -rf node_modules package-lock.json && npm install && npm run build

# Étape 7 : Permissions
RUN chown -R www-data:www-data /var/www/html/storage \
    /var/www/html/bootstrap/cache \
    /var/www/html/public \
    && chmod -R 755 /var/www/html/public

# Étape 8 : Nginx
COPY nginx.conf /etc/nginx/sites-available/default

# Étape 9 : Script de démarrage
COPY start.sh /start.sh
RUN chmod +x /start.sh

EXPOSE 8080

CMD ["/start.sh"]
