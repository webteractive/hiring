<?php

namespace App\Http\Livewire;

use App\Events\JobApplicationSubmitted;
use App\JobApplication;
use Livewire\Component;
use Livewire\WithFileUploads;

class ApplicationForm extends Component
{
    use WithFileUploads;
    
    public $position;
    public $name;
    public $email;
    public $message;
    public $file;
    public $notification;

    protected $rules = [
        'name' => 'required|min:5',
        'email' => 'required|email',
        'file' => 'required|file|mimes:pdf,doc,docx,odf',
        'message' => 'required|min:300',
    ];

    protected $messages = [
        'name.min' => 'Your name is suspiciously short.',
        'name.required' => 'Please enter you full name to apply for this pisition.',
        'email.email' => 'Please enter a valid email address so we can contact you later.',
        'email.required' => 'Please enter your email address to apply for this position.',
        'file.required' => 'Please include your resume or CV to apply for this position.',
        'file.mimes' => 'Please upload a version of your resume of type <strong>.pdf</strong>, <strong>.doc</strong>, <strong>.docx</strong>, or <strong>.odf</strong>.',
        'message.min' => 'Your cover letter must be at least 300 characters.',
        'message.required' => 'Please include your cover letter to apply for this position. Click <a class="font-bold hover:underline" href="https://www.thebalancecareers.com/cover-letters-4161919" target="_blank" rel="noopener noreferrer">here</a> for more details about cover letters.',
    ];

    protected $listeners = ['apply'];


    public function apply($position)
    {
        $this->fill([
            'position' => $position
        ]);
        $this->dispatchBrowserEvent('application-form-opened');
    }

    public function close()
    {
        $this->resetErrorBag();
        $this->resetValidation();
        $this->reset('position', 'name', 'email', 'file', 'message', 'notification');
        $this->dispatchBrowserEvent('application-form-closed');
    }

    public function setMessage($message, $skipValidation = false)
    {
        $this->message = $message;

        if ($skipValidation === false) {
            $this->validateOnly('message');
        }
    }

    public function submit()
    {
        $this->clearNotification();
        $this->validate();

        event(new JobApplicationSubmitted(
            (new JobApplication)
                ->for($this->position)
                ->from($this->name, $this->email)
                ->with($this->message)
                ->attach($this->file->store('resume', 'local'))
        ));

        $this->successfull();
        $this->resetErrorBag();
        $this->resetValidation();
        $this->reset('name', 'email', 'file', 'message');

        $this->dispatchBrowserEvent('application-sent');
    }

    public function clearNotification()
    {
        $this->reset('notification');
    }

    public function successfull()
    {
        $this->notification = 'Application submitted. Thanks and have a great day.';
    }

    public function updated($propertyName)
    {
        $this->clearNotification();
        $this->validateOnly($propertyName);
    }

    public function getJobsProperty()
    {
        return collect(json_decode(file_get_contents(config('app.positions')), true));  
    }
    
    public function render()
    {
        return view('livewire.application-form');
    }
}
