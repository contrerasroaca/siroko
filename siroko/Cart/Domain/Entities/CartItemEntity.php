<?php

declare(strict_types=1);

namespace Siroko\Cart\Domain\Entities;

use Siroko\Cart\Domain\ValuesObjects\ProductIdValueObject;
use Siroko\Cart\Domain\ValuesObjects\QuantityValueObject;

final class CartItemEntity
{
    /** 
     * @var ProductId
     */
    private $id;
    /** 
     * @var Quantity
     */
    private $quantity;
    public function __construct(ProductIdValueObject $id, QuantityValueObject $quantity)
    {
        $this->id = $id;
        $this->quantity = $quantity;
    }
}
