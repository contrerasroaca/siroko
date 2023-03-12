<?php

declare(strict_types=1);

namespace Siroko\Cart\Domain;

use Siroko\Cart\Domain\ValueObjects\CartItemPrice;
use Siroko\Cart\Domain\ValueObjects\CartItemProductId;
use Siroko\Cart\Domain\ValueObjects\CartItemQuantity;
use Siroko\Cart\Domain\ValueObjects\CartItemUserId;

/**
 * Summary of CartItem
 */
final class CartItem
{
    private $id;
    private $user_id;
    private $product_id;
    private $quantity;
    private $createdAt;
    private $updatedAt;
    private $price;
    public function __construct(CartItemUserId $user_id, CartItemProductId $product_id, CartItemQuantity $quantity)
    {
        $this->user_id = $user_id;
        $this->product_id = $product_id;
        $this->quantity = $quantity;
    }

    public function userId(): CartItemUserId
    {
        return $this->user_id;
    }
    public function productId(): CartItemProductId
    {
        return $this->product_id;
    }
    public function quantity(): CartItemQuantity
    {
        return $this->quantity;
    }
    public function price(): CartItemPrice
    {
        return $this->price;
    }
    /**
     * Summary of addItem
     * @param CartItemUserId $user_id
     * @param CartItemProductId $product_id
     * @param CartItemQuantity $quantity
     * @return CartItem
     */
    public static function addItem(CartItemUserId $user_id, CartItemProductId $product_id, CartItemQuantity $quantity)
    {
        $addItem = new self($user_id,  $product_id,  $quantity);
        return $addItem;
    }
}
