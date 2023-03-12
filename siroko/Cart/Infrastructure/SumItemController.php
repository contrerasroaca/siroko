<?php

declare(strict_types=1);

namespace Siroko\Cart\Infrastructure;

use Siroko\Cart\Infrastructure\Repositories\EloquentCartItemRepository;
use Siroko\Cart\Application\SumCartItemUseCase;

/**
 * Summary of AddItemControllerr
 */
final class SumItemController
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

        $sumItem = new SumCartItemUseCase($this->repository);

        return $sumItem->__invoke();
    }
}
