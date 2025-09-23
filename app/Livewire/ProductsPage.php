<?php

namespace App\Livewire;

use App\Services\ProductService;
use Livewire\Attributes\Title;
use Livewire\Component;

class ProductsPage extends Component
{
    #[Title('Products Page')]
    protected ProductService $productService;

    public $products = [];

    public $paginate = 3;

    public $search = '';

    public function boot(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function mount($search = '')
    {
        $this->search = $search;
    }

    public function updatingSearch()
    {
        // $this->resetPage();
    }

    public function loadProducts()
    {
        $this->products = $this->productService->getAllProducts($this->paginate);

    }

    public function render()
    {
        $productsItems = empty($this->search)
                    ? $this->productService->getAllProducts($this->paginate)
                    : $this->productService->searchProducts($this->search, $this->paginate);

        return view('livewire.products-page', [
                    'productsItems' => $productsItems,
                    'search' => $this->search,
                ]);
    }
}
