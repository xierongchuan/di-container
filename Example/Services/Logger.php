<?php

declare(strict_types=1);

namespace Example\Services;

// Сервис для логирования
class Logger
{
    public function log(string $message): void
    {
        echo "LOG: $message\n";
    }
}
