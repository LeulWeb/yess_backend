FROM php:8.1.27-fpm
WORKDIR /var/www/yess
COPY composer.json composer.lock package.json package-lock.json ./
RUN compoeser install && npm install 
COPY . .
EXPOSE 80
CMD ["php","artisan","serve","--host", "0.0.0.0", "--port", "80"]