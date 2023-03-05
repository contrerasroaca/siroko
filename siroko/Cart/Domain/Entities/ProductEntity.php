<?php

declare(strict_types=1);

namespace Siroko\Cart\Domain\Entities;

use Siroko\Cart\Domain\ValuesObjects\ProductIdValueObject;


final class ProductEntity
{
    /** 
     * @var ProductId
     */
    private $id;

    public function __construct(ProductIdValueObject $id)
    {
        $this->id = $id;
    }
    
}
