<?php

declare(strict_types=1);

namespace Siroko\Cart\Infrastructure\EloquentProductRepository;

use Siroko\Cart\Domain\Contracts\ProductRepository;
use Siroko\Cart\Domain\Entities\ProductEntity;
use Siroko\Cart\Domain\ValuesObjects\ProductIdValueObject;
use App\Models\Product;

final class EloquentProductRepository implements ProductRepository
{
    private $model;
    public function __construct()
    {
        $this->model = new Product();
    }
    /**
     * @param \Siroko\Cart\Domain\ValuesObjects\ProductIdValueObject $producId
     * @return \Siroko\Cart\Domain\Entities\ProductEntity|null
     */
    public function search(ProductIdValueObject $productId): ?ProductEntity
    {
        
        return $this->model->findOrFail($productId->getProductId());
    }
}
