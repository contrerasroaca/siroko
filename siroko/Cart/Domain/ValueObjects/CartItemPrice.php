<?php

declare(strict_types=1);

namespace Siroko\Cart\Domain\ValueObjects;

/**
 * Summary of CartItemPrice
 */
final class CartItemPrice
{
    private $value;


    public function __construct(float $quantity)
    {
        $this->validateId($quantity);
        $this->value = $quantity;
    }
    private function validateId($quantity)
    {
        if (!filter_var($quantity, FILTER_VALIDATE_FLOAT)) {
            sprintf('<%s> Cantidad invalida', static::class, $quantity);
        }
    }
    /**
     * Summary of value
     * @return int
     */
    public function value(): float
    {
        return $this->value;
    }
}
