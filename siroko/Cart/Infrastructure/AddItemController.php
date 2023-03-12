<?php

declare(strict_types=1);

namespace Siroko\Cart\Infrastructure;

use Siroko\Cart\Infrastructure\Repositories\EloquentCartItemRepository;
use Illuminate\Http\Request;
use Siroko\Cart\Application\AddCartItemUseCase;

/**
 * Summary of AddItemControllerr
 */
final class AddItemController
{
    private $repository;
    /**
     * Summary of __construct
     * @param EloquentCartItemRepository $repository
     */
    public function __construct(EloquentCartItemRepository $repository)
    {
        $this->repository = $repository;
    }
    public function __invoke(Request $request)
    {
        $user_id = 1;
        $product_id = intval($request->input('id'));
        $quantity = intval($request->input('quantity'));


        $addItem = new AddCartItemUseCase($this->repository);

        return $addItem->__invoke($user_id, $product_id, $quantity);
    }
}
