<?php

declare(strict_types=1);

namespace Siroko\Cart\Application;


use Siroko\Cart\Domain\Contracts\CartItemRepositoryContract;
use Siroko\Cart\Domain\CartItem;
use Siroko\Cart\Domain\ValueObjects\CartItemId;



class DeleteCartItemUseCase
{
    private $repository;


    public function __construct(CartItemRepositoryContract $repository)
    {
        $this->repository = $repository;
    }
    public function __invoke(int $item_id): void
    {
        $itemId = new CartItemId($item_id);
       
        $this->repository->delete($itemId->value());
    }
}
