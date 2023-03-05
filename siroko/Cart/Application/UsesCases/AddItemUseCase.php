<?php

declare(strict_types=1);

namespace Siroko\Cart\Application\UsesCases;

use Siroko\Cart\Domain\Contracts\ProductRepository;
use Siroko\Cart\Domain\ValuesObjects\ProductIdValueObject;
use Siroko\Cart\Domain\ValuesObjects\QuantityValueObject;
use Siroko\Cart\Domain\Entities\CartItemEntity;

final class AddItemUseCase
{
    private FindProductUseCase $finder;
    private ProductRepository $productRepository;
    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
        $this->finder = new FindProductUseCase($this->productRepository);
    }
    public function execute(int $quantity, int $productId)
    {
        $this->finder->execute($productId);
        $cartItems = new CartItemEntity(
            new ProductIdValueObject($productId),
            new QuantityValueObject($quantity)
        );
    }
}
