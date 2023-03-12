<?php

declare(strict_types=1);

namespace Siroko\Cart\Application;


use Siroko\Cart\Domain\Contracts\CartItemRepositoryContract;



class SumCartItemUseCase
{
    private $repository;


    public function __construct(CartItemRepositoryContract $repository)
    {
        $this->repository = $repository;
    }
    public function __invoke(): float
    {
        return $this->repository->sumItems();
    }
}
