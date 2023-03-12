<?php

declare(strict_types=1);

namespace Siroko\Cart\Domain\ValueObjects;

/**
 * Summary of CartItemProductId
 */
final class CartItemProductId
{
    private $value;


    public function __construct(int $product_id)
    {
        $this->validateId($product_id);
        $this->value = $product_id;
    }
    private function validateId($product_id)
    {
        if (!filter_var($product_id, FILTER_VALIDATE_INT)) {
            sprintf('<%s> Producto ID invalido', static::class, $product_id);
        }
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
