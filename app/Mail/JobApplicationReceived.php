<?php

namespace App\Mail;

use App\JobApplication;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class JobApplicationReceived extends Mailable
{
    use Queueable, SerializesModels;

    protected $application;

    public function __construct(JobApplication $application)
    {
        $this->application = $application;
    }

    public function build()
    {
        return $this->from('webteractiveco@gmail.com', 'Webteractive')
                    ->to($this->application->email, $this->application->name)
                    ->subject($this->application->position . ' application received')
                    ->markdown('emails.job-application.received', [
                        'application' => $this->application
                    ]);
    }
}
