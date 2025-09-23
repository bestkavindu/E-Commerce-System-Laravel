<?php

namespace App\Services;

use App\Repositories\ProductRepository;
use Livewire\WithPagination;

class ProductService
{
    protected ProductRepository $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function getAllProducts($paginate)
    {
        return $this->productRepository->paginate($paginate);
    }

    public function getProductById($id)
    {
        return $this->productRepository->find($id);
    }

    public function searchProducts($search, $paginate)
    {
        // Implement search logic here
        return $this->productRepository->search($search, $paginate);
    }

    public function getFilteredProducts($categories = [], $search = '', $paginate = 15, $inStock = false, $onSale = false)
    {
        return $this->productRepository->filterByCategories($categories, $search, $paginate, $inStock, $onSale);
    }

}
