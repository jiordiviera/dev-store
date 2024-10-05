<?php

namespace App\Livewire;

use App\Models\Category;
use Illuminate\Contracts\View\View;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Categories - CodeByJiordi')]
class CategoriesPage extends Component
{
    public function render():View
    {
        $categories=Category::where('is_active',1)->get();
        return view('livewire.categories-page',[
            'categories'=>$categories
        ]);
    }
}
