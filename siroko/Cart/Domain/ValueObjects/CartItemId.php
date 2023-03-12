<?php

declare(strict_types=1);

namespace Siroko\Cart\Domain\ValueObjects;

/**
 * Summary of CartItemId
 */
final class CartItemId
{
    private $value;


    public function __construct(int $id)
    {
        $this->validateId($id);
        $this->value = $id;
    }
    private function validateId($id)
    {
        if (!filter_var($id, FILTER_VALIDATE_INT)) {
            sprintf('<%s> ID invalido', static::class, $id);
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
