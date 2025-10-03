<?php

namespace App\Livewire;

use App\Models\Category;
use App\Services\ProductService;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

class ProductsPage extends Component
{
    use WithPagination;

    #[Title('Products Page')]

    protected ProductService $productService;

    public $categories = [];
    public $selectedCategories = [];
    public $paginate = 9;
    public $search = '';
    public $inStock;
    public $onSale;
    public $priceRange = 100000;

    public function boot(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function mount($search = '')
    {
        $this->search = $search;
        $this->categories = Category::where('is_active', 1)->get();
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatedSelectedCategories()
    {
        $this->resetPage();
    }

    public function updatedInStock()
    {
        $this->resetPage();
    }

    public function updatedOnSale()
    {
        $this->resetPage();
    }

    public function render()
    {
        $productsItems = $this->productService->getFilteredProducts(
            $this->selectedCategories,
            $this->search,
            $this->paginate,
            $this->inStock,
            $this->onSale,
            $this->priceRange
        );

        return view('livewire.products-page', [
            'productsItems' => $productsItems,
        ]);
    }
}
