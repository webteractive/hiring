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
            'company' => [
                'name' => 'Webteractive',
                'url' => 'https://webteractive.co',
                'logo' => url(asset('images/webteractive.svg')),
            ],
            'address' => [
                'line1' => 'Door 15, 2nd Fl., Ebro-Dakudao Bldg., San Pedro St.',
                'city' => 'Davao City',
                'state' => 'Davao del Sur',
                'zip' => '8000',
                'country' => 'PH'
            ],
            'email' => 'webteractiveco@gmail.com',
            'phone' => '(82) 322 6940',
            'socials' => [
                ['platform' => 'facebook', 'url' => 'https://www.facebook.com/WebteractiveSoftwareDevelopmentServices/'],
                ['platform' => 'twitter', 'url' => 'https://twitter.com/webteractive'],
                ['platform' => 'linkedin', 'url' => 'https://ph.linkedin.com/company/webteractive'],
                ['platform' => 'instagram', 'url' => 'https://www.instagram.com/webteractive/'],
                ['platform' => 'github', 'url' => 'https://github.com/webteractive'],
            ]
        ]);
    }
}
