<?php

declare(strict_types=1);

namespace Example\Services;

use Example\Interfaces\PaymentGatewayInterface;
use Example\Services\Logger;

// Основной сервис который зависит от других
class OrderService
{
    private PaymentGatewayInterface $gateway;
    private Logger $logger;

    // Конструктор использует TypeHinting для объявления зависимостей
    public function __construct(PaymentGatewayInterface $gateway, Logger $logger)
    {
        $this->gateway = $gateway;
        $this->logger = $logger;
    }

    public function placeOrder(float $amount): void
    {
        $this->logger->log("Попытка разместить заказ на сумму: $amount");
        $this->gateway->charge($amount);
        $this->logger->log("Заказ размещен успешно.");
    }
}
