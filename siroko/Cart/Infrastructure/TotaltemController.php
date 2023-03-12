<?php

declare(strict_types=1);

namespace Siroko\Cart\Infrastructure;

use Siroko\Cart\Infrastructure\Repositories\EloquentCartItemRepository;
use Siroko\Cart\Application\TotalCartItemUseCase;

/**
 * Summary of AddItemControllerr
 */
final class TotaltemController
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
    public function __invoke()
    {

        $sumItem = new TotalCartItemUseCase($this->repository);

        return $sumItem->__invoke();
    }
}
