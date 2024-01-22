FROM php:7.4-fpm
COPY . /var/www
RUN docker-php-ext-install pdo_mysql
EXPOSE 9000
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=9000"]
