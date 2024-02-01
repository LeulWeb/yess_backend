<?php

namespace App\Livewire\Jobs;

use App\Enums\JobSchedule;
use App\Enums\JobSector;
use App\Models\Job;
use Livewire\Component;
use Livewire\Attributes\Validate;
use Livewire\WithFileUploads;

class Create extends Component
{


    use WithFileUploads;

    public string $logoName = '';

    #[Validate('required|max:50')]
    public $title;
    #[Validate('required|min:50|max:65535')]
    public $description;

    #[Validate('nullable|image|mimes:jpeg,png,jpg,gif|max:7168')]
    public $logo;
    #[Validate('required')]
    public $sector;
    #[Validate('required')]
    public $requirements;
    #[Validate('required')]
    public $schedule;

    #[Validate('numeric|between:1,1000000')]
    public $vacancies;
    #[Validate('nullable')]
    public $note;
    #[Validate('required|date')]
    public $deadline;
    #[Validate('nullable')]
    public $responsibilities;
    #[Validate('nullable')]
    public $salary_compensation;

    #[Validate('nullable')]
    public $experience;
    #[Validate('nullable')]
    public $opportunities;

    #[Validate('required|email|unique:jobs,contact_email')]
    public $contact_email;

    #[Validate('required|regex:/^\+(?:[0-9] ?){6,14}[0-9]$/')]
    public $contact_phone;

    #[Validate('nullable|max:200')]
    public $location;
    #[Validate('nullable|max:200')]
    public $contact_address;




    public function create()
    {
        $validated = $this->validate();



        if(!empty($this->logo)){
            $this->logoName = time().'.'.$this->logo->extension();
            $this->logo->storeAs('job', $this->logoName, 'public');
        }

        $validated['logo']= 'job/'.$this->logoName;


        Job::create($validated);
        session()->flash('success', 'job created successfully');
        return redirect()->route('jobs.index');
    }


    public function render()
    {
        return view('livewire.jobs.create', [
            'JobSectors' => JobSector::getValues(),
            'JobSchedule' =>JobSchedule::getValues(),

        ]);
    }
}

