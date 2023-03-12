<?php

declare(strict_types=1);

namespace Siroko\Cart\Infrastructure;

use Siroko\Cart\Infrastructure\Repositories\EloquentCartItemRepository;
use Siroko\Cart\Application\CheckoutCartItemUseCase;


/**
 * Summary of CheckoutCartItemControllerr
 */
final class CheckoutCartItemController
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
    /**
     * Summary of __invoke
     * @return void
     */
    public function __invoke()
    {
        $listItems = new CheckoutCartItemUseCase($this->repository);

        return $listItems->__invoke();
    }
}
