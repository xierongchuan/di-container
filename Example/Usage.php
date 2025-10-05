<?php

declare(strict_types=1);

namespace Example;

require __DIR__ . '/../vendor/autoload.php';

use App\Container;
use Example\Interfaces\PaymentGatewayInterface;
use Example\Payments\StripeGateway;
use Example\Services\Logger;

echo "### Example Start ###\n";

$container = new Container();


// Регистрация зависимостейй

// По интерфейсу
$container->bind(PaymentGatewayInterface::class, StripeGateway::class);

// По имени
$container->singleton(Logger::class);

// Регистрация данных
$container->bind('api.stripe.key', fn() => '74hfy7q3f87qg38947hf3487gg38hufeahloq3hf');

echo "### Example End ###\n";
