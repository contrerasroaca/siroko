<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Siroko\Cart\Infrastructure\TotaltemController;
use Siroko\Cart\Infrastructure\SumItemController;
use Siroko\Cart\Infrastructure\CheckoutCartItemController;

/**
 * Summary of CheckoutController
 */
class CheckoutApiController extends Controller
{
    //
    private $checkoutCartItemController;
    private $totalCartItems;
    private $sumCartItems;

    /**
     * Summary of __construct
     * @param CheckoutCartItemController $checkoutCartItemController
     * @param TotaltemController $totalCartItems
     */
    public function __construct(CheckoutCartItemController $checkoutCartItemController, TotaltemController $totalCartItems, SumItemController $sumCartItems)
    {
        $this->checkoutCartItemController = $checkoutCartItemController;
        $this->totalCartItems = $totalCartItems;
        $this->sumCartItems = $sumCartItems;
    }
    public function __invoke(Request $request)
    {
        try {
            $list = $this->checkoutCartItemController->__invoke();
            $totalCartItems =  $this->totalCartItems->__invoke();
            $totalPriceCartItems =  $this->sumCartItems->__invoke();
            return response()->json(['cartItems' => ($list) ? $list : null, 'totalCartItems' => $totalCartItems, 'totalPriceCartItems' => $totalPriceCartItems], 200);
        } catch (\Exception $e) {
            return response()->json(["result" => "Error: " . $e->getMessage()], 400);
        }
    }
}
