<?php

namespace App\Livewire;

use App\Models\Brand;
use App\Models\Category;
use Illuminate\Contracts\View\View;
use Livewire\Component;
use Livewire\Attributes\Title;

#[Title('Accueil ')]
class HomePage extends Component
{
    public function render():View
    {
        $brands=Brand::where('is_active',1)->get();
        $categories=Category::where('is_active',1)->get();
//        dd($brands);
        return view('livewire.home-page',[
            'brands'=>$brands,
            'categories'=>$categories
        ]);
    }
}
