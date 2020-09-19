<?php

namespace App\View\Components;

use Illuminate\View\Component;

class JobLayout extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.job-layout', [
            'address' => [
                'Door 15, 2nd Fl., Ebro-Dakudao Bldg., San Pedro St.',
                'Davao City, Davao del Sur 8000, Philippines'
            ],
            'email' => 'webteractiveco@gmail.com',
            'phone' => '(82) 322 6940',
            'socials' => [
                ['platform' => 'facebook', 'url' => ''],
                ['platform' => 'twitter', 'url' => ''],
                ['platform' => 'linkedin', 'url' => ''],
                ['platform' => 'instagram', 'url' => ''],
                ['platform' => 'github', 'url' => ''],
            ]
        ]);
    }
}
