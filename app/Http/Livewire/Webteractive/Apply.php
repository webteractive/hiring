<?php

namespace App\Http\Livewire\Webteractive;

use App\Events\JobApplicationSubmitted;
use App\JobApplication;
use Livewire\Component;
use Livewire\WithFileUploads;
use App\Mail\JobApplicationSent;
use Illuminate\Support\Facades\Mail;

class Apply extends Component
{
    use WithFileUploads;
    
    public $position;
    public $name;
    public $email;
    public $message;
    public $file;
    public $notification;

    public $shown = false;

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


    public function apply($position)
    {
        $this->fill([
            'position' => $position,
            'shown' => true
        ]);
        $this->dispatchBrowserEvent('application-form-opened');
    }

    public function close()
    {
        $this->resetErrorBag();
        $this->resetValidation();
        $this->reset('position', 'name', 'email', 'file', 'message', 'shown', 'notification');
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
        return collect([
            [
                'title' => 'QA Tester',
                'description' => [
                    'We are looking for a QA Tester to assess software quality through manual and automated testing. You will be responsible for finding and reporting bugs and glitches. You will ensure that our products, apps, and systems work as expected.',
                    'In this role, you should have a keen eye for detail and excellent communication skills. If you are also competent in executing test cases and are passionate about quality, we’d like to meet you.'
                ],
                'responsibilities' => [
                    'Review and analyze system specifications',
                    'Collaborate with the development team to develop effective strategies and test plans',
                    'Execute test cases (manual or automated) and analyze results',
                    'Evaluate code according to specifications',
                    'Create logs to document testing phases and defects',
                    'Report bugs and errors to the development team',
                    'Help troubleshoot issues',
                    'Conduct post-release/ post-implementation testing',
                ],
                'requirements' => [
                    'Can code (PHP/Laravel/ExpressionEngine/WordPress/JavaScript)',
                    'Attention to detail',
                    'Excellent communication skills',
                    'Ability to document and troubleshoot errors',
                    'Familiarity with agile frameworks and regression testing is a plus'
                ]
            ],
            [
                'title' => 'Graphic Designer',
                'description' => [
                    'We are looking for a Graphic Designer to create engaging and on-brand graphics for a variety of media.',
                    'Your graphics should capture the attention of those who see them and communicate the right message. For this, you need to have a creative flair and a strong ability to translate requirements into design. If you can communicate well and work methodically as part of a team, we’d like to meet you.',
                ],
                'responsibilities' => [
                    'Study design briefs and determine requirements',
                    'Conceptualize visuals based on requirements',
                    'Prepare rough drafts and present ideas',
                    'Develop illustrations, logos and other designs using software or by hand',
                    'Use the appropriate colors and layouts for each graphic',
                    'Collaborate with the development team to produce the final design',
                    'Test graphics across various media',
                    'Amend designs after feedback',
                    'Ensure final graphics and layouts are visually appealing and on-brand'

                ],
                'requirements' => [
                    'Proven graphic designing experience',
                    'A strong portfolio of illustrations or other graphics',
                    'Familiarity with design software and technologies (Adobe Photoshop, Adobe Illustrator, Adobe InDesign, Adobe XD, InVision, Zeplin)',
                    'A keen eye for aesthetics and details',
                    'Excellent communication skills',
                    'Ability to work methodically and meet deadlines',
                    'Degree in Design, Fine Arts or related field is a plus',
                ]
            ]
        ]);  
    }

    public function render()
    {
        return view('livewire.webteractive.apply');
    }
}
