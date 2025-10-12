# Étape 1 : image de base
FROM php:8.2-fpm

# Étape 2 : installation des dépendances système
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpq-dev \
    libzip-dev \
    unzip \
    && docker-php-ext-install pdo pdo_pgsql zip

# Installer les extensions PHP
RUN docker-php-ext-install pdo pdo_pgsql zip

# Étape 3 : installation de Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Étape 4 : configuration du projet
WORKDIR /var/www/html

COPY . .

RUN composer install --no-dev --optimize-autoloader
RUN php artisan key:generate

# Étape 5 : permissions
RUN chown -R www-data:www-data /var/www/html

CMD ["php-fpm"]
