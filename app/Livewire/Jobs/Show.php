<?php

namespace App\Livewire\Jobs;

use App\Enums\JobSchedule;
use App\Enums\JobSector;
use App\Models\Job;
use Livewire\Component;
use Livewire\Attributes\Validate;
use Livewire\WithFileUploads;
use Livewire\Attributes\Title;
#[Title('Jobs')]

class Show extends Component
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

    public Job $job;


    public bool $editMode = false;


    public function toggleEdit(){
        $this->editMode = !$this->editMode;
    }


    public function mount(Job $job)
    {
        $this->description = $job->description;
        $this->title = $job->title;
        $this->sector = $job->sector;
        $this->schedule = $job->schedule;
        $this->experience = $job->experience;
        $this->deadline = $job->deadline;
        $this->contact_email = $job->contact_email;
        $this->contact_phone = $job->contact_phone;
        $this->location = $job->location;
        $this->responsibilities = $job->responsibilities;
        $this->requirements = $job->requirements;
        $this->note = $job->note;
        $this->salary_compensation = $job->salary_compensation;
        $this->opportunities = $job->opportunities;
        $this->vacancies = $job->vacancies;
        $this->contact_address = $job->contact_address;


        // Initialize and $logoName properties

        $this->logoName = '';


        $this->logoName = $this->logoName ?: $job->logo;
    }


    public function delete()
    {
        $this->job->delete();
        session()->flash('success', 'job '. $this->job->title  .' deleted successfully');
        return redirect()->route('jobs.index');
    }

    public function update()
    {
        $this->validate([
            // Add validation rules for your fields here
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'sector' => 'required|string',
            'schedule' => 'required|string',
            'experience' => 'required|integer',
            'deadline' => 'required|date|',
            'contact_email' => 'required|email',
            'contact_phone' => 'required|string',
            'location' => 'required|string',
            'responsibilities' => 'nullable|string',
            'requirements' => 'nullable|string',
            'note' => 'nullable|string',
            'opportunities' => 'nullable|string',
            'vacancies' => 'nullable|numeric',
            'contact_address' => 'nullable|string',
            // Add more validation rules as needed
        ]);

        $this->job->update([
            'title' => $this->title,
            'description' => $this->description,
            'sector' => $this->sector,
            'schedule' => $this->schedule,
            'experience' => $this->experience,
            'deadline' => $this->deadline,
            'contact_email' => $this->contact_email,
            'contact_phone' => $this->contact_phone,
            'location' => $this->location,
            'responsibilities' => $this->responsibilities,
            'requirements' => $this->requirements,
            'note' => $this->note,
            'salary_compensation' => $this->salary_compensation,
            'opportunities' => $this->opportunities,
            'contact_address' => $this->contact_address,
            'vacancies' => $this->vacancies,
            // Update other fields accordingly
        ]);



        if ($this->logo) {
            // Handle logo upload and update
            $this->job->update(['logo' => $this->logo->store('path/to/logo/folder', 'public')]);
        }

        session()->flash('success', 'job updated successfully');
        return redirect()->route('jobs.index');
    }
    public function cancel()
        {
        return redirect()->route('jobs.index');
        }

    public function render()
    {
        return view('livewire.jobs.show', [
            'JobSectors'=>JobSector::getValues(),
            'JobSchedule' =>JobSchedule::getValues(),
        ]);
    }
}
