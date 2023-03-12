<?php

declare(strict_types=1);

namespace Siroko\Cart\Application;


use Siroko\Cart\Domain\Contracts\CartItemRepositoryContract;
use Siroko\Cart\Domain\CartItem;
use Siroko\Cart\Domain\ValueObjects\CartItemUserId;

use Siroko\Cart\Domain\ValueObjects\CartItemQuantity;
use Siroko\Cart\Domain\ValueObjects\CartItemProductId;


class RemoveCartItemUseCase
{
    private $repository;


    public function __construct(CartItemRepositoryContract $repository)
    {
        $this->repository = $repository;
    }
    public function __invoke(int $user_id, int $product_id, int $quantity): void
    {

        $productId = new CartItemProductId($product_id);
        $userId = new CartItemUserId($user_id);
        $quant = new CartItemQuantity($quantity);

        $item =  CartItem::addItem($userId, $productId, $quant);
        
        $this->repository->remove($item);
    }
}
