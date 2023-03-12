<?php

declare(strict_types=1);

namespace Siroko\Cart\Infrastructure;

use Siroko\Cart\Infrastructure\Repositories\EloquentProductRepository;
use Illuminate\Http\Request;
use Siroko\Cart\Application\ProductsListUseCase;

/**
 * Summary of ProductListControllerr
 */
final class ProductListController
{
    private $repository;
    /**
     * Summary of __construct
     * @param EloquentProductRepository $repository
     */
    public function __construct(EloquentProductRepository $repository)
    {
        $this->repository = $repository;
    }
    public function __invoke(Request $request)
    {
        $listProducts= new ProductsListUseCase($this->repository);
      
        return $listProducts->__invoke();
    }
}
