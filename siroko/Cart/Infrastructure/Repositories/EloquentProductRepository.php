<?php

declare(strict_types=1);

namespace Siroko\Cart\Infrastructure\Repositories;

use App\Models\Product as EloquentProductModel;

use Siroko\Cart\Domain\Contracts\ProductRepositoryContract;



/**
 * Summary of EloquentProductRepository
 */
final class EloquentProductRepository implements ProductRepositoryContract
{


    /**
     * Summary of eloquentProducModel
     * @var
     */
    private $eloquentProducModel;
    /**
     * Summary of __construct
     */
    public function __construct()
    {
        $this->eloquentProducModel = new EloquentProductModel;
    }
    /**
     * @return mixed
     */
    public function list()
    {
        $productoList = $this->eloquentProducModel;

        return $productoList->all();
    }
}
