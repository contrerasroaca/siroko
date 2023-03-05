<?php

declare(strict_types=1);

namespace Siroko\Cart\Domain\ValuesObjects;
use Siroko\Cart\Domain\Exceptions\IncorrectQuantityException;
final class QuantityValueObject
{
    /**
     * @var int
     */
    private $quantity;

    public function __construct(int $quantity)
    {
        $this->quantity = $quantity;
    }



    /**
     * Get the value of quantity
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * Set the value of quantity
     *
     * @return  self
     */
    public function setQuantity($quantity)
    {

        if ($quantity < 0) {
            throw new IncorrectQuantityException('Cantidad Incorrecta');
        }
        $this->quantity = $quantity;
        return $this;
    }
}
