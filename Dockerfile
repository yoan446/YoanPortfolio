# Étape 1 : image de base PHP + Nginx
FROM php:8.2-fpm

# Étape 2 : dépendances système nécessaires
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpq-dev \
    libzip-dev \
    unzip \
    nginx \
    && docker-php-ext-install pdo pdo_pgsql zip \
    && rm -rf /var/lib/apt/lists/*

# Étape 3 : installation de Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Étape 4 : définition du répertoire de travail
WORKDIR /var/www/html
COPY . .

# Étape 5 : installation des dépendances PHP uniquement
RUN composer install --no-dev --optimize-autoloader

# Étape 6 : permissions Laravel
RUN chown -R www-data:www-data /var/www/html/storage \
    /var/www/html/bootstrap/cache \
    /var/www/html/public \
    && chmod -R 755 /var/www/html/public

# Étape 7 : configuration Nginx
COPY nginx.conf /etc/nginx/sites-available/default

# Étape 8 : script de démarrage
COPY start.sh /start.sh
RUN chmod +x /start.sh

# Exposition du port
EXPOSE 8080

# Commande de démarrage
CMD ["/start.sh"]
