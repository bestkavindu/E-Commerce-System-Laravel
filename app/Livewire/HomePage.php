<?php

namespace App\Livewire;

use App\Models\Brand;
use Livewire\Component;
use Livewire\Attributes\Title;

class HomePage extends Component
{
    public $brands;
    #[Title('Home Page')]
    public function mount()
    {
        $this->brands = Brand::get();
    }
    public function render()
    {
        return view('livewire.home-page');
    }
}
