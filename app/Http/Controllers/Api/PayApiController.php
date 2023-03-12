<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Siroko\Cart\Infrastructure\TotaltemController;
use Siroko\Cart\Infrastructure\SumItemController;
use Siroko\Cart\Infrastructure\CheckoutCartItemController;

/**
 * Summary of PayController
 */
class PayApiController extends Controller
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
            $cartItems = $this->checkoutCartItemController->__invoke();

            if ($cartItems->count() == 0) {
                return response()->json(["result" => "Error: No cart items"], 400);
            }

            $cartTotal =  $this->totalCartItems->__invoke();
            $cartTotalItems =  $this->sumCartItems->__invoke();
            return response()->json(['cartItems' => $cartItems, 'totalCartItems' => $cartTotalItems, 'totalPriceCartItems' => $cartTotal], 200);
        } catch (\Exception $e) {
            return response()->json(["result" => "Error: " . $e->getMessage()], 400);
        }
    }
}
