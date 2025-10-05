<?php

declare(strict_types=1);

namespace Example\Payments;

use Example\Interfaces\PaymentGatewayInterface;

// Реализация шлюза
class StripeGateway implements PaymentGatewayInterface
{
    public function charge(float $amount): void
    {
        echo "Списание суммы в размере $$amount с помощью Stripe.\n";
    }
}
