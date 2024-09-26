<?php

namespace App\Livewire;

use App\Models\Order;
use Illuminate\Contracts\View\View;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

#[Title('Mes commandes')]
class MyOrdersPage extends Component
{
    use WithPagination;

    public function render():View
    {
        $my_orders= Order::where('user_id',auth()->id())->latest()->paginate(3);
        return view('livewire.my-orders-page',[
            'orders'=>$my_orders,
        ]);
    }
}
