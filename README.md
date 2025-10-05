# DI Container
Выполнение тестового задания #1

## Задание #1
Спроектируйте и реализуйте легковесную версию DI контейнера.
Он должен регистрировать и разрешать зависимости по:
1. Имени сервиса
2. Интерфейсу сервиса
3. Реализации сервиса
4. Поддерживать возможности конструктора основанные на type-hints
5. Управлять жизненным циклом объектов (одиночка\запрос\итд)

## Build
```bash
docker compose build
```

## Run
```bash
docker compose run --rm app php examples/usage.php
```

## Test
```bash
docker compose run --rm app vendor/bin/phpunit
```
