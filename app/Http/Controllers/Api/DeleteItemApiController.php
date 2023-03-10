<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Siroko\Cart\Infrastructure\DeleteItemController as DeleteItemControllerInfra;
use Siroko\Cart\Infrastructure\SumItemController;
use Siroko\Cart\Infrastructure\TotaltemController;
use Siroko\Cart\Infrastructure\ProductListController;
use Siroko\Cart\Infrastructure\CheckoutCartItemController;



class DeleteItemApiController extends Controller
{
    //
    private $DeleteItemController;
    private $CheckoutCartItemController;
    private $totalCartItems;
    private $sumCartItems;


    public function __construct(DeleteItemControllerInfra $DeleteItemController, CheckoutCartItemController $CheckoutCartItemController, TotaltemController $totalCartItems, SumItemController $sumCartItems)
    {
        $this->DeleteItemController = $DeleteItemController;
        $this->CheckoutCartItemController = $CheckoutCartItemController;
        $this->totalCartItems = $totalCartItems;
        $this->sumCartItems = $sumCartItems;
    }

    public function __invoke($item_id)
    {
        try {
            $list = $this->DeleteItemController->__invoke($item_id);

            $caritems = $this->CheckoutCartItemController->__invoke();
            $totalCartItems =  $this->totalCartItems->__invoke();
            $totalPriceCartItems =  $this->sumCartItems->__invoke();

            return response()->json(['cartItems' => $caritems, 'totalCartItems' => $totalCartItems, 'totalPriceCartItems' => $totalPriceCartItems], 200);
        } catch (\Exception $e) {
            return response()->json(["result" => "Error: " . $e->getMessage()], 400);
        }
    }
}
