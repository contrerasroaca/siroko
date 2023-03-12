<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Siroko\Cart\Infrastructure\TotaltemController;
use Siroko\Cart\Infrastructure\SumItemController;
use Siroko\Cart\Infrastructure\CheckoutCartItemController;

/**
 * Summary of PayController
 */
class PayController extends Controller
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
        $cartItems = $this->checkoutCartItemController->__invoke();

        if ($cartItems->count() == 0) {
            return redirect()->route('products.index');
        }

        $cartTotal =  $this->totalCartItems->__invoke();
        $cartTotalItems =  $this->sumCartItems->__invoke();

        return  view('pay', ['cartTotal' => $cartTotal, 'cartTotalItems' => $cartTotalItems]);
    }
}
