<?php

declare(strict_types=1);

namespace Siroko\Cart\Domain\ValueObjects;

/**
 * Summary of CartItemQuantity
 */
final class CartItemQuantity
{
    private $value;


    public function __construct(int $quantity)
    {
        $this->validateId($quantity);
        $this->validateNoNgeative($quantity);
        $this->value = $quantity;
    }
    private function validateId($quantity)
    {
        if (!filter_var($quantity, FILTER_VALIDATE_INT)) {
            sprintf('<%s> Cantidad invalida', static::class, $quantity);
            return false;
        }
        return true;
    }
    private function validateNoNgeative($quantity)
    {
        if ($quantity<1) {
            sprintf('<%s> Cantidad invalida', static::class, $quantity);
            return false;
        }
        return true;
    }
    /**
     * Summary of value
     * @return int
     */
    public function value(): int
    {
        return $this->value;
    }
}
