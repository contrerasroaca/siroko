<?php

declare(strict_types=1);

namespace Siroko\Cart\Domain\Contracts;

use Siroko\Cart\Domain\ValuesObjects\ProductIdValueObject;
use Siroko\Cart\Domain\Entities\ProductEntity;

interface ProductRepository
{
    public function search(ProductIdValueObject $producId): ?ProductEntity;
}
