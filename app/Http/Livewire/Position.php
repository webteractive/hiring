<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Position as Model;

class Position extends Component
{
    public $slug;

    public function mount($slug)
    {
        tap($this->getPosition($slug), function ($position) {

            abort_if(is_null($position), 404);

            $this->slug = $position->slug;
        });
    }

    public function getPositionProperty()
    {
        return $this->getPosition($this->slug);
    }

    public function getPerksProperty()
    {
        return [
            "Competitive salary",
            "Standard benefits (SSS, PHIC, and HDMF)",
            "13th month pay",
            "Performance bonus",
            "Holidays",
            "Paid leaves (upon regularization)",
            "HMO (upon regularization)"
        ];
    }

    public function getPosition($slug)
    {
        return Model::whereSlug($slug)->first();
    }

    public function render()
    {
        return view('livewire.position');
    }
}
