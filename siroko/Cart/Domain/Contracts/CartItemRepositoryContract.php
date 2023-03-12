<?php

declare(strict_types=1);

namespace Siroko\Cart\Domain\Contracts;

use Siroko\Cart\Domain\CartItem;

interface CartItemRepositoryContract
{
    public function  list();
    public function  add(CartItem $item);
    public function  totalItems();
    public function  sumItems();
    public function  remove(CartItem $item);
    public function  delete(int $itemId);
}
