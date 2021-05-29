<?php

namespace App\Http\Livewire;

use App\Models\Position;
use Livewire\Component;

class NotHiringYet extends Component
{
    public function getPositionsProperty()
    {
        return Position::all();
    }

    public function render()
    {
        return view('livewire.not-hiring-yet');
    }
}
