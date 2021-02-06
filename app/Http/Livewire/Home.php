<?php

namespace App\Http\Livewire;

use App\Models\Position;
use Livewire\Component;

class Home extends Component
{
    public function getPositionsProperty()
    {
        return Position::all();
    }

    public function render()
    {
        return view('livewire.home');
    }
}
