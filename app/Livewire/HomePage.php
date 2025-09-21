<?php

namespace App\Livewire;

use App\Models\Brand;
use App\Models\Category;
use Livewire\Component;
use Livewire\Attributes\Title;

class HomePage extends Component
{
    public $brands;
    public $categories;
    #[Title('Home Page')]
    public function mount()
    {
        $this->brands = Brand::get();
        $this->categories = Category::get();
    }
    public function render()
    {
        return view('livewire.home-page');
    }
}
