<?php

declare(strict_types=1);

namespace Siroko\Cart\Infrastructure\Repositories;

use App\Models\CartItem as EloquentCartItemModel;
use App\Models\Product as EloquentProductModel;
use Siroko\Cart\Domain\CartItem;
use Siroko\Cart\Domain\Contracts\CartItemRepositoryContract;
use Siroko\Cart\Domain\ValueObjects\CartItemId;



/**
 * Summary of EloquentCartItemRepository
 */
final class EloquentCartItemRepository implements CartItemRepositoryContract
{


    /**
     * Summary of eloquentCartItemModel
     * @var
     */
    private $eloquentCartItemModel;
    /**
     * Summary of __construct
     */
    public function __construct()
    {
        $this->eloquentCartItemModel = new EloquentCartItemModel;
    }

    /**
     * @return mixed
     */
    public function list()
    {        
        $cartItems = EloquentCartItemModel::where('user_id', 1)->get();
       
        return $cartItems;
    }

    /**
     * @return mixed
     */
    public function add(CartItem $item): void
    {

        $newItem = $this->eloquentCartItemModel;
        $price = EloquentProductModel::find($item->productId()->value())->price;
        
        $data = [
            'user_id' => $item->userId()->value(),
            'product_id' => $item->productId()->value(),
            'quantity' => $item->quantity()->value(),
            'price' => ($price ? $price : 0) * $item->quantity()->value(),
        ];
        $existItem = $newItem->where('product_id', $item->productId()->value())->first();
        if ($existItem) {
            $oldValueQuantity = $existItem->getOriginal('quantity');
            $oldValuePrice = $existItem->getOriginal('price');
            $existItem->quantity = $oldValueQuantity + $data['quantity'];
            $existItem->price = $oldValuePrice + ($data['quantity'] *  ($price ? $price : 0));
            $existItem->save();
        } else {
            $newItem->create($data);
        }
    }

    /**
     * @return mixed
     */
    public function totalItems(): float
    {
        $items = $this->eloquentCartItemModel;
        return floatval($items->sum('quantity'));
    }

    /**
     * @return mixed
     */
    public function sumItems(): float
    {
        $items = $this->eloquentCartItemModel;
        return floatval($items->sum('price'));
    }
    /**
     * @param CartItem $item
     * @return mixed
     */
    public function remove(CartItem $item): void
    {
        $update = EloquentCartItemModel::where('product_id', $item->productId()->value())->first();
        $product = EloquentProductModel::find($item->productId()->value())->first();
        if ($update && $update->quantity > 0 && $update->quantity >= $item->quantity()->value()) {
            $oldValueQuantity = $update->getOriginal('quantity');
            $oldValuePrice = $update->getOriginal('price');
            $update->quantity = $oldValueQuantity - $item->quantity()->value();
            $update->price = $oldValuePrice - ($item->quantity()->value() * $product->price);
            $update->save();
        }
    }
    /**
     * @param CartItem $item
     * @return mixed
     */
    public function delete(int $itemId)
    {
        // Eliminar el ítem del carrito
        EloquentCartItemModel::destroy($itemId);
    }
}
