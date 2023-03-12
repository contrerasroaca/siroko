<?php

declare(strict_types=1);

namespace Siroko\Cart\Application;


use Siroko\Cart\Domain\Contracts\CartItemRepositoryContract;


class CountCartItemUseCase
{
    private $repository;


    public function __construct(CartItemRepositoryContract $repository)
    {
        $this->repository = $repository;
    }
    public function __invoke(): int
    {
        return $this->repository->totalItems();
    }
}
