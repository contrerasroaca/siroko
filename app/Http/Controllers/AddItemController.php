<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Siroko\Cart\Infrastructure\AddItemController as AddItemControllerInfra;
use Siroko\Cart\Infrastructure\SumItemController;
use Siroko\Cart\Infrastructure\TotaltemController;
use Siroko\Cart\Infrastructure\ProductListController;



class AddItemController extends Controller
{
    //
    private $addItemController;
    private $productsListController;
    private $totalCartItems;
    private $sumCartItems;


    public function __construct(AddItemControllerInfra $addItemController, ProductListController $productsListController, TotaltemController $totalCartItems, SumItemController $sumCartItems)
    {
        $this->addItemController = $addItemController;
        $this->productsListController = $productsListController;
        $this->totalCartItems = $totalCartItems;
        $this->sumCartItems = $sumCartItems;
    }

    public function __invoke(Request $request)
    {

        $list = $this->addItemController->__invoke($request);
        $totalCartItems =  $this->totalCartItems->__invoke();
        $totalPriceCartItems =  $this->sumCartItems->__invoke();
        $products = $this->productsListController->__invoke($request);


        return view('productlist', ['totalCartItems' => $totalCartItems, 'totalPriceCartItems' => $totalPriceCartItems, "products" => $products]);
    }
}
