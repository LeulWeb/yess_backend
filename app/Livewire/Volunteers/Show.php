<?php

namespace App\Livewire\volunteers;

use App\Enums\AgeGroup;
use App\Enums\Status;
use App\Enums\VolunteerActivities;
use App\Models\volunteer;
use Livewire\Component;
use Livewire\Attributes\Validate;
use Livewire\WithFileUploads;

class Show extends Component
{

    use WithFileUploads;


    public String $imageName;


    #[Validate('required|max:50')]
    public $title;
    #[Validate('required|min:50|max:65535')]
    public $description;

    #[Validate('nullable|image|mimes:jpeg,png,jpg,gif|max:7168')]
    public $image;
    #[Validate('required')]
    public $target_community;

    #[Validate('required|max:50')]
    public $status;

    #[Validate('required|max:100')]
    public $activity_type;

    #[Validate('required|email')]
    public $contact_email;
    #[Validate('required|regex:/^\+(?:[0-9] ?){6,14}[0-9]$/')]
    public $contact_phone;
    #[Validate('nullable|max:200')]
    public $location;
    #[Validate('required|date')]
    public $start_date;
    #[Validate('required|date')]
    public $end_date;
    #[Validate('required')]
    public $age_group;



    public volunteer $volunteer;


    public bool $editMode = false;


    public function toggleEdit(){
        $this->editMode = !$this->editMode;
    }


    public function mount(volunteer $volunteer)
    {
        $this->description = $volunteer->description;
        $this->title = $volunteer->title;
        $this->target_community = $volunteer->target_community;
        $this->status = $volunteer->status;
        $this->activity_type = $volunteer->activity_type;
        $this->contact_email = $volunteer->contact_email;
        $this->contact_phone = $volunteer->contact_phone;
        $this->location = $volunteer->location;
        $this->start_date = $volunteer->start_date;
        $this->end_date = $volunteer->end_date;
        $this->age_group = $volunteer->age_group;

        // Initialize $imageName and $logotitle properties
        $this->imageName = '';
        $this->imageName = $this->imageName ?: $volunteer->image;

    }
    public function cancel()
    {
       return redirect()->route('volunteers.index');
     }


    public function delete()
    {
        $this->volunteer->delete();
        session()->flash('success', 'volunteer '. $this->volunteer->title  .' deleted successfully');
        return redirect()->route('volunteers.index');
    }



    public function update()
    {
        $this->validate([
            // Add validation rules for your fields here
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'target_community' => 'required|string',
            'status' => 'required|string',
            'activity_type' => 'required|string|max:255',
            'contact_email' => 'required|email',
            'contact_phone' => 'required|string',
            'location' => 'required|string',
            'start_date' => 'nullable',
            'end_date' => 'nullable',
            'age_group' => 'nullable',

            // Add more validation rules as needed
        ]);

        $this->volunteer->update([
            'title' => $this->title,
            'description' => $this->description,
            'target_community' => $this->target_community,
            'status' => $this->status,

            'activity_type' => $this->activity_type,
            'contact_email' => $this->contact_email,
            'contact_phone' => $this->contact_phone,
            'location' => $this->location,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'age_group' => $this->age_group,

        ]);

        if ($this->image) {
            // Handle image upload and update
            $this->volunteer->update(['image' => $this->image->store('path/to/image/folder', 'public')]);
        }



        session()->flash('success', 'volunteer updated successfully');
        return redirect()->route('volunteers.index');
    }

    public function render()
    {
        return view('livewire.volunteers.show', [
            'Status' => Status::getValues(),
            'AgeGroup' => AgeGroup::getValues(),
            'VolunteerActivities' =>VolunteerActivities::getValues(),
        ]);
    }
}
