FROM php:8.1-apache

RUN apt-get update && apt-get install -y \
    libzip-dev libpq-dev zip unzip git curl \
    && docker-php-ext-install pdo pdo_mysql pdo_pgsql zip

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

WORKDIR /var/www/html

COPY . .

RUN composer install --no-dev --optimize-autoloader --ignore-platform-reqs

RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

RUN sed -i 's|DocumentRoot /var/www/html|DocumentRoot /var/www/html/public|g' /etc/apache2/sites-available/000-default.conf
RUN a2enmod rewrite

COPY start.sh /start.sh
RUN chmod +x /start.sh

EXPOSE 80
CMD ["/start.sh"]
