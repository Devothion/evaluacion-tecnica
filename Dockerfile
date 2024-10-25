FROM elrincondeisma/php-for-laravel:8.3.7

WORKDIR /app
COPY . .

RUN composer install
RUN composer require laravel/octane
COPY .envDev .env
RUN mkdir -p /app/storage/logs

RUN php artisan octane:install --server="swoole"

RUN apk add --no-cache nodejs npm
RUN npm install
RUN npm run build

CMD ["php", "artisan", "octane:start", "--server=swoole", "--host=0.0.0.0", "--port=8000"]
EXPOSE 8000