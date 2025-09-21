<?php

namespace App\Livewire;

use App\Models\Category;
use Livewire\Component;
use Livewire\Attributes\Title;


class CategoryPage extends Component
{
    public $categories;


    #[Title('Category Page')]

    public function mount()
    {
        $this->categories = Category::get();
    }
    public function render()
    {
        return view('livewire.category-page');
    }
}
