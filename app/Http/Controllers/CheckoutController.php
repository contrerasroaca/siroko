<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Siroko\Cart\Infrastructure\TotaltemController;
use Siroko\Cart\Infrastructure\SumItemController;
use Siroko\Cart\Infrastructure\CheckoutCartItemController;

/**
 * Summary of CheckoutController
 */
class CheckoutController extends Controller
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
        $list = $this->checkoutCartItemController->__invoke();
        $totalCartItems =  $this->totalCartItems->__invoke();
        $totalPriceCartItems =  $this->sumCartItems->__invoke();

        // Redirigir a confirmación de compra
        return view('shoppingcart', ['cartItems' => ($list) ? $list : null, 'cartTotal' => $totalPriceCartItems, 'cartTotalItems' => $totalCartItems]);
    }
}
