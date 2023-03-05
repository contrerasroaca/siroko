<?php

declare(strict_types=1);

namespace Siroko\Cart\Application\UsesCases;

use Siroko\Cart\Domain\Contracts\ProductRepository;
use Siroko\Cart\Domain\Entities\ProductEntity;
use Siroko\Cart\Domain\ValuesObjects\ProductIdValueObject;

final class FindProductUseCase
{
    /** 
     * @var productRepository
     */
    private $productRepository;
    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }
    public function execute(int $productId): ?ProductEntity
    {
        return $this->productRepository->search(new ProductIdValueObject($productId));
    }
}
