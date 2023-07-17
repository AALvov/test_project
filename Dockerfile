FROM php:8.1-fpm

# Установка необходимых зависимостей
RUN apt-get update && apt-get install -y \
    libpq-dev \
    zip \
    unzip

# Установка расширений PHP
RUN docker-php-ext-install pdo pdo_pgsql

# Копирование файлов проекта в Docker-контейнер
COPY . /var/www/html
WORKDIR /var/www/html

# Установка зависимостей Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Установка Composer зависимостей проекта
RUN composer install


# Установка прав доступа для кэша и сессий Laravel
RUN chown -R www-data:www-data /var/www/html/storage
RUN chmod -R 775 /var/www/html/storage

# Запуск веб-сервера PHP
RUN php artisan optimize  \
    && php artisan key:generate
CMD php artisan storage:link
CMD php artisan serve --host=0.0.0.0 --port=8000
