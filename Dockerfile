# Étape 1 : image de base
FROM php:8.2-fpm

# Étape 2 : installation des dépendances système + Nginx
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

# Étape 4 : configuration du projet
WORKDIR /var/www/html
COPY . .
RUN composer install --no-dev --optimize-autoloader

# Configuration Nginx
COPY nginx.conf /etc/nginx/sites-available/default

# Étape 5 : permissions
RUN chown -R www-data:www-data /var/www/html

# Exposer le port
EXPOSE 8080

# Script de démarrage
COPY start.sh /start.sh
RUN chmod +x /start.sh

CMD ["/start.sh"]