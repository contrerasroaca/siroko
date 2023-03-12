<?php

declare(strict_types=1);

namespace Siroko\Cart\Domain\ValueObjects;

/**
 * Summary of CartItemUserId
 */
final class CartItemUserId
{
    private $value;


    public function __construct(int $user_id)
    {
        $this->validateId($user_id);
        $this->value = $user_id;
    }
    private function validateId($user_id)
    {
        if (!filter_var($user_id, FILTER_VALIDATE_INT)) {
            sprintf('<%s> User ID invalido', static::class, $user_id);
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
