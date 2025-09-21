<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;
use Livewire\Attributes\Title;


class ProductsPage extends Component
{
    #[Title('Products Page')]

    public $products;

    public function mount()
    {
        $this->products = Product::get();
    }
    public function render()
    {
        return view('livewire.products-page');
    }
}
