<?php

declare(strict_types=1);

namespace Example;

require __DIR__ . '/../vendor/autoload.php';

use App\Container;
use Example\Interfaces\PaymentGatewayInterface;
use Example\Payments\StripeGateway;
use Example\Services\Logger;
use Example\Services\OrderService;

echo "### Example Start ###\n";

$container = new Container();


// Регистрация зависимостей

echo "### Registering ###\n";

// По интерфейсу
$container->bind(PaymentGatewayInterface::class, StripeGateway::class);

// По имени
$container->singleton(Logger::class);

// Регистрация данных
$container->bind('api.stripe.key', fn() => '74hfy7q3f87qg38947hf3487gg38hufeahloq3hf');


// Разрешение зависимостей

echo "### Resolving ###\n";


// Мы просим контейнер создать OrderService.
$orderService1 = $container->get(OrderService::class);
$orderService1->placeOrder(100.00);

$orderService2 = $container->get(OrderService::class);
$logger1 = $container->get(Logger::class);
$logger2 = $container->get(Logger::class);

// Проверяем что логгер это один и тот же объект (singleton)
if (spl_object_hash($logger1) === spl_object_hash($logger2)) {
    echo "Logger одиночка. Success!\n";
}

// Проверяем что OrderService это разные объекты (transient)
if (spl_object_hash($orderService1) !== spl_object_hash($orderService2)) {
    echo "OrderService временный, Success!\n";
}

// Разрешаем зависимость по ключу
$apiKey = $container->get('api.stripe.key');
echo "Resolved API Key: $apiKey\n";


echo "### Example End ###\n";
