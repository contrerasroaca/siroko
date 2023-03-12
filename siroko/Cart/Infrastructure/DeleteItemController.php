<?php

declare(strict_types=1);

namespace Siroko\Cart\Infrastructure;

use Siroko\Cart\Infrastructure\Repositories\EloquentCartItemRepository;
use Illuminate\Http\Request;
use Siroko\Cart\Application\DeleteCartItemUseCase;

/**
 * Summary of DeleteItemControllerr
 */
final class DeleteItemController
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
    public function __invoke($itemId)
    {
     
        $item_id = intval($itemId);
        
        $deleteItem = new DeleteCartItemUseCase($this->repository);
        return $deleteItem->__invoke($item_id);
    }
}
