<?php

declare(strict_types=1);

namespace Siroko\Cart\Application;

use Siroko\Cart\Domain\Contracts\ProductRepositoryContract;

class ProductsListUseCase
{
    private $repository;


    public function __construct(ProductRepositoryContract $repository)
    {
        $this->repository = $repository;
    }
    public function __invoke()
    {
        return $this->repository->list();
    }
}
