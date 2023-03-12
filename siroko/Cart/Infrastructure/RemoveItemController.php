<?php

declare(strict_types=1);

namespace Siroko\Cart\Infrastructure;

use Siroko\Cart\Infrastructure\Repositories\EloquentCartItemRepository;
use Illuminate\Http\Request;
use Siroko\Cart\Application\RemoveCartItemUseCase;

/**
 * Summary of RemoveItemControllerr
 */
final class RemoveItemController
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
        $removeItem = new RemoveCartItemUseCase($this->repository);
        return $removeItem->__invoke($user_id, $product_id, $quantity);
    }
}
