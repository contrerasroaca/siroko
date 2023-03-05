<?php

declare(strict_types=1);

namespace Siroko\Cart\Domain\ValuesObjects;

use Siroko\Cart\Domain\Exceptions\IncorrectProductIdException;

final class ProductIdValueObject
{

    /**
     * @var int
     */
    protected $productId;

    public function __construct(int $productId)
    {
        $this->productId = $productId;
    }



    /**
     * Get the value of productId
     */
    public function getProductId()
    {
        return $this->productId;
    }

    /**
     * Set the value of productId
     *
     * @return  self
     */
    private function setProductId($productId)
    {
        if ($productId > 0) {
            $this->productId = $productId;
        } else {
            throw new IncorrectProductIdException("Id de producto no Valido");
        }
        return $this;
    }
}
