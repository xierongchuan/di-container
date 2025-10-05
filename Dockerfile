# ---------------- STAGE: build ----------------
FROM php:8.4.12-fpm AS build

WORKDIR /app

# Скачиваем установщик Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/bin --filename=composer \
  && chmod +x /usr/bin/composer

# Копирование исходного кода
COPY . .

# Копирование composer файлы и установка зависимостей
COPY composer.json composer.lock ./
RUN composer install --no-dev --optimize-autoloader --prefer-dist

# ---------------- STAGE: runtime ----------------
FROM php:8.4.12-fpm AS runner

WORKDIR /app

# Копируем из build стадии всё что нужно для запуска
COPY --from=build /app /app

# Запуск
CMD ["php", "examples/Usage.php"]
