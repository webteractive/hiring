<?php

namespace App\Listeners;

use App\Mail\JobApplicationSent;
use Illuminate\Support\Facades\Mail;
use App\Events\JobApplicationSubmitted;

class NotifyHiringManagerForTheNewJobApplication
{
    public function handle(JobApplicationSubmitted $event)
    {
        Mail::send(new JobApplicationSent($event->jobApplication));
    }
}
