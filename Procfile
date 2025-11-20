web: vendor/bin/heroku-php-apache2 public/
release: npm ci --include=dev && npm run build && php artisan migrate --force