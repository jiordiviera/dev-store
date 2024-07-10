<?php

namespace App\Livewire;

use Livewire\Component;

class BadgeGenerator extends Component
{
    public function render()
    {
        return view('livewire.badge-generator');
    }

    public function generatePDF(): void
    {
        $this->dispatch('generate-pdf');
    }
}
