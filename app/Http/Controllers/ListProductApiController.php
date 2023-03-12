<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Siroko\Cart\Infrastructure\TotaltemController;
use Siroko\Cart\Infrastructure\SumItemController;
use Siroko\Cart\Infrastructure\ProductListController;

/**
 * Summary of ListProductApiController
 */
class ListProductApiController extends Controller
{
    //
    private $productsListController;
    private $totalCartItems;
    private $sumCartItems;

    /**
     * Summary of __construct
     * @param \Siroko\Cart\Infrastructure\ProductListController $productsListController
     * @param TotaltemController $totalCartItems
     */
    public function __construct(ProductListController $productsListController, TotaltemController $totalCartItems, SumItemController $sumCartItems)
    {
        $this->productsListController = $productsListController;
        $this->totalCartItems = $totalCartItems;
        $this->sumCartItems = $sumCartItems;
    }
    public function __invoke(Request $request)
    {
        $products = $this->productsListController->__invoke($request);
        $totalCartItems =  $this->totalCartItems->__invoke();
        $totalPriceCartItems =  $this->sumCartItems->__invoke();


        return response()->json(['products' => $products, 'totalCartItems' => $totalCartItems, 'totalPriceCartItems' => $totalPriceCartItems], 200);
    }
}
