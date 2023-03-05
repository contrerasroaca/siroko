<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\CartItem;

class ProductController extends Controller
{
    public function index()
    {
        // Obtener todos los productos de la base de datos
        $products = Product::all();
        $totalCartItems = CartItem::sum('quantity');
        $totalPriceCartItems = CartItem::sum('price');
        // Pasar los productos a la vista
        return view('productlist', ['totalCartItems' => $totalCartItems, 'totalPriceCartItems' => $totalPriceCartItems, "products" => $products]);
    }
}
