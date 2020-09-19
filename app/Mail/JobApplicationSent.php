<?php

namespace App\Mail;

use App\JobApplication;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class JobApplicationSent extends Mailable
{
    use Queueable, SerializesModels;

    protected $application;

    public function __construct(JobApplication $application)
    {
        $this->application = $application;
    }

    public function build()
    {
        return $this->to('webteractiveco@gmail.com', 'Jobs @ Webteractibe')
                    ->from($this->application->email, $this->application->name)
                    ->subject('Job application for ' . $this->application->position . ' position')
                    ->markdown('emails.job-application.sent', [
                        'application' => $this->application
                    ])
                    ->attachFromStorage($this->application->resume);
    }
}
