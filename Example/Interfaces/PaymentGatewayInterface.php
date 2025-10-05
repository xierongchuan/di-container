<?php

declare(strict_types=1);

namespace Example\Interfaces;

// Интерфейс для платёжного шлюза
interface PaymentGatewayInterface
{
    public function charge(float $amount): void;
}
