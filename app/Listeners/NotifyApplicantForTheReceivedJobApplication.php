<?php

namespace App\Listeners;

use Illuminate\Support\Facades\Mail;
use App\Mail\JobApplicationReceived;
use App\Events\JobApplicationSubmitted;

class NotifyApplicantForTheReceivedJobApplication
{
    public function handle(JobApplicationSubmitted $event)
    {
        Mail::send(new JobApplicationReceived($event->jobApplication));
    }
}
