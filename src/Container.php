<?php

declare(strict_types=1);

namespace App;

use App\Exceptions\ContainerException;
use Psr\Container\ContainerInterface;
use Closure;

/**
 * Легковесный DI контейнер.
 */
class Container implements ContainerInterface
{
    /**
     * @var array Хранилище для зарегистрированных зависимостей.
     * В формате: ['имя_сервиса' => ['concrete' => 'реализация', 'singleton' => bool]]
     */
    protected array $bindings = [];

    /**
     * @var array Хранилище для уже созданных экземпляров одиночек.
     */
    protected array $instances = [];

    /**
     * Регистрирует зависимость в контейнере.
     *
     * @param string $abstract Абстракция интерфейс/имя класса/ключ.
     * @param string|Closure|null $concrete Конкретная реализация или фабрика.
     * @param bool $singleton Является ли зависимость одиночкой.
     */
    public function bind(string $abstract, string|Closure|null $concrete, bool $singleton = false): void
    {
        // Если конкретная реализация не указана, считаем, что абстракция является реализацией.
        if ($concrete === null) {
            $concrete = $abstract;
        }

        $this->bindings[$abstract] = [
            'concrete' => $concrete,
            'singleton' => $singleton
        ];
    }

    /**
     * Метод для регистрации одиночки.
     *
     * @param string $abstract
     * @param string|Closure|null $concrete
     */
    public function singleton(string $abstract, string|Closure|null $concrete = null): void
    {
        $this->bind($abstract, $concrete, true);
    }

    /**
     * Разрешает (создает и возвращает) зависимость из контейнера.
     *
     * @param string $id Идентификатор/абстракция зависимости.
     * @return mixed
     * @throws ContainerException
     */
    public function get(string $id): mixed
    {
        //
    }

    /**
     * Проверяет зарегистрирована ли зависимость.
     *
     * @param string $id Идентификатор/абстракция зависимости.
     * @return bool
     */
    public function has(string $id): bool
    {
        //
    }
}
