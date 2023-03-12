<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Siroko\Cart\Infrastructure\RemoveItemController as RemoveItemControllerInfra;
use Siroko\Cart\Infrastructure\SumItemController;
use Siroko\Cart\Infrastructure\TotaltemController;
use Siroko\Cart\Infrastructure\ProductListController;



class RemoveItemController extends Controller
{
    //
    private $removeItemController;
    private $productsListController;
    private $totalCartItems;
    private $sumCartItems;


    public function __construct(RemoveItemControllerInfra $RemoveItemController, ProductListController $productsListController, TotaltemController $totalCartItems, SumItemController $sumCartItems)
    {
        $this->removeItemController = $RemoveItemController;
        $this->productsListController = $productsListController;
        $this->totalCartItems = $totalCartItems;
        $this->sumCartItems = $sumCartItems;
    }

    public function __invoke(Request $request)
    {

        $list = $this->removeItemController->__invoke($request);
        $totalCartItems =  $this->totalCartItems->__invoke();
        $totalPriceCartItems =  $this->sumCartItems->__invoke();
        $products = $this->productsListController->__invoke($request);


        return view('productlist', ['totalCartItems' => $totalCartItems, 'totalPriceCartItems' => $totalPriceCartItems, "products" => $products]);
    }
}
