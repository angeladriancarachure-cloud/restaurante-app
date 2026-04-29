#!/bin/bash
cd /var/www/html
php artisan config:clear
php artisan migrate --force 2>&1
php artisan db:seed --force 2>&1
apache2-foreground
