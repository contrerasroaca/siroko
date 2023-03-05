<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\CartItem;
use Siroko\Cart\Application\UsesCases\AddItemUseCase;

class CartController extends Controller
{
    public function addItem(Request $request)
    {
        /*$addItemCase = new AddItemUseCase();
        $addItemCase->execute($request->input('quantity'), $productId);
*/
        $productId = $request->input('id');
        $product = Product::find($productId);
        $quantity = $request->input('quantity');
        $update = CartItem::where('product_id', $product->id)->first();

        if ($update) {
            $oldValueQuantity = $update->getOriginal('quantity');
            $oldValuePrice = $update->getOriginal('price');
            $update->quantity = $oldValueQuantity + $quantity;
            $update->price = $oldValuePrice + ($quantity * $product->price);
            $update->save();
        } else {
            CartItem::create([
                'user_id' => 1,
                'product_id' => $product->id,
                'quantity' => $quantity,
                'price' => $product->price * $quantity,
            ]);
        }

        $totalCartItems = CartItem::sum('quantity');
        $totalPriceCartItems = CartItem::sum('price');
        $products = Product::all();

        return view('productlist', ['totalCartItems' => $totalCartItems, 'totalPriceCartItems' => $totalPriceCartItems, "products" => $products]);
    }

    public function removeItem($itemId)
    {
        // Eliminar el ítem del carrito
        CartItem::destroy($itemId);
        return $this->checkout();
    }

    public function updateQuantityByProduct(Request $request)
    {
        $productId = $request->input('id');
        $quantity = $request->input('quantity');
        $update = CartItem::where('product_id', $productId)->first();
        $product = Product::find($productId);
        if ($update && $update->quantity > 0 && $update->quantity >= $quantity) {
            $oldValueQuantity = $update->getOriginal('quantity');
            $oldValuePrice = $update->getOriginal('price');
            $update->quantity = $oldValueQuantity - $quantity;
            $update->price = $oldValuePrice - ($quantity * $product->price);
            $update->save();
        }
        return redirect()->route('products.index');
    }
    public function checkout()
    {
        // Valido que el usuario tenga al menos un ítem en el carrito
        $cartItems = CartItem::where('user_id', 1)->get();
        if ($cartItems->isEmpty()) {
            return redirect()->route('products.index');
        }

        // Calculo el precio total del carrito
        $cartTotal = $cartItems->sum('price');
        $cartTotalItems = $cartItems->sum('quantity');


        // Redirigir a confirmación de compra
        return view('shoppingcart', ['cartItems' => $cartItems, 'cartTotal' => $cartTotal, 'cartTotalItems' => $cartTotalItems]);
    }
    public function pay()
    {

        $cartItems = CartItem::where('user_id', 1)->get();
        if ($cartItems->isEmpty()) {
            return redirect()->route('products.index');
        }

        // Calculo el precio total del carrito
        $cartTotal = $cartItems->sum('price');
        $cartTotalItems = $cartItems->sum('quantity');
        return  view('pay', compact('cartTotal', 'cartTotalItems'));
    }
}
