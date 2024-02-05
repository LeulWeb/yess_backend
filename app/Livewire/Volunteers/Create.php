<?php

namespace App\Livewire\Volunteers;

use App\Enums\AgeGroup;
use App\Enums\Status;
use App\Enums\VolunteerActivities;
use App\Models\Volunteer;
use Livewire\Component;
use Livewire\Attributes\Validate;
use Livewire\WithFileUploads;

class Create extends Component
{


    use WithFileUploads;


    public String $imageName = '';

    #[Validate('required|max:50')]
    public $title;
    #[Validate('required|min:50|max:65535')]
    public $description;

    #[Validate('nullable|image|mimes:jpeg,png,jpg,gif|max:7168')]

    public $image;

    #[Validate('nullable')]
    public $target_community;


    #[Validate('required|max:50')]
    public $activity_type;

    #[Validate('required')]
    public $age_group;

    #[Validate('required|max:100')]
    public $status;

    #[Validate('required|email|unique:volunteers,contact_email')]
    public $contact_email;


    #[Validate('required|regex:/^\+(?:[0-9] ?){6,14}[0-9]$/')]
    public $contact_phone;
    #[Validate('nullable|max:200')]
    public $location;
    #[Validate('required|date')]
        public $start_date;
     #[Validate('required|date|')]
        public $end_date;


    public function create()
    {
        $validated = $this->validate();


        if(!empty($this->image)){
            $this->imageName = time().'.'.$this->image->extension();
            $this->image->storeAs('volunteer', $this->imageName, 'public');
        }

        $validated['image']= 'volunteer/'.$this->imageName;

        Volunteer::create($validated);
        session()->flash('success', 'volunteer created successfully');
        return redirect()->route('volunteers.index');
    }


    public function render()
    {
        return view('livewire.volunteers.create', [
            'Status' => Status::getValues(),
            'AgeGroup' => AgeGroup::getValues(),
            'VolunteerActivities' =>VolunteerActivities::getValues(),

        ]);
    }
}
