# Utiliser PHP 8.2 avec FPM
FROM php:8.2-fpm

# Définir le répertoire de travail
WORKDIR /var/www

# Installer les dépendances système nécessaires
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    libpq-dev \
    zip \
    unzip \
    nginx \
    supervisor \
    gettext-base \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*

# Installer les extensions PHP nécessaires pour Laravel + PostgreSQL
RUN docker-php-ext-configure pgsql -with-pgsql=/usr/local/pgsql \
    && docker-php-ext-install \
    pdo \
    pdo_pgsql \
    pgsql \
    mbstring \
    exif \
    pcntl \
    bcmath \
    gd

# Installer Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copier les fichiers de l'application
COPY . /var/www

# Installer les dépendances PHP (sans dev dependencies)
RUN composer install --no-dev --optimize-autoloader --no-interaction

# Copier la configuration Nginx
COPY docker/nginx.conf /etc/nginx/sites-available/default

# Copier la configuration Supervisor
COPY docker/supervisord.conf /etc/supervisor/conf.d/supervisord.conf

# Créer les répertoires nécessaires et définir les permissions
RUN mkdir -p \
    /var/www/storage/framework/cache \
    /var/www/storage/framework/sessions \
    /var/www/storage/framework/views \
    /var/www/storage/logs \
    /var/www/bootstrap/cache \
    && chown -R www-data:www-data /var/www \
    && chmod -R 775 /var/www/storage \
    && chmod -R 775 /var/www/bootstrap/cache

# Copier le script de démarrage
COPY docker/start.sh /usr/local/bin/start.sh
RUN chmod +x /usr/local/bin/start.sh

# Exposer le port (Render utilise la variable $PORT)
EXPOSE 80

# Utiliser supervisor pour gérer nginx et php-fpm
CMD ["/usr/local/bin/start.sh"]