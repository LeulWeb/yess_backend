<?php

namespace App\Livewire\Sponsers;

use App\Enums\Organizations;
use App\Enums\Status;
use App\Models\Sponser;
use Livewire\Component;
use Livewire\Attributes\Validate;
use Livewire\WithFileUploads;

class Show extends Component
{
    use WithFileUploads;
    public String $logoName;

    #[Validate('nullable')]
    public $organization;
    #[Validate('nullable|image|mimes:jpeg,png,jpg,gif|max:7168')]
    public $logo;
    #[Validate('required')]
    public $organization_type;
    #[Validate('required')]
    public $status;
    #[Validate('nullable')]
    public $sponsorship_level;
    #[Validate('required|max:50')]
    public $area_of_collaboration;

    #[Validate('required|email|unique:sponsers,email')]
    public $email;
    #[Validate('required|regex:/^\+(?:[0-9] ?){6,14}[0-9]$/')]
    public $phone;
    #[Validate('required|sometimes|file|mimes:doc,docx,pdf,txt|max:20480')]
    public $agreement_file;

    public Sponser $sponser;


    public bool $editMode = false;


    public function toggleEdit(){
        $this->editMode = !$this->editMode;
    }


    public function mount(Sponser $sponser)
    { $this->organization = $sponser->organization;
        $this->email = $sponser->email;
        $this->phone = $sponser->phone;
        $this->area_of_collaboration = $sponser->area_of_collaboration;
        $this->agreement_file = $sponser->agreement_file;
        $this->organization_type = $sponser->organization_type;
        $this->status = $sponser->status;
        $this->sponsorship_level =$sponser->sponsorship_level;

        // Initialize $imageName and $logoName properties
           $this->logoName = '';
        $this->logoName = $this->logoName ?: $sponser->logo;
    }


    public function delete()
    {
        $this->sponser->delete();
        session()->flash('success', 'sponser '. $this->sponser->email  .' deleted successfully');
        return redirect()->route('sponsers.index');
    }



    public function update()
    {
        $this->validate([
            // Add validation rules for your fields here
            'organization' => 'nullable',
            'status' => 'required|string',
            'organization_type' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|string',
            'area_of_collaboration' => 'nullable',
            'agreement_file' => 'nullable|string',
            'sponsorship_level'=>'nullable|string',
            // Add more validation rules as needed

        ]);
        // if ($this->agreement_file) {
        //     $path = $this->agreement_file->store('path/to/document/files');
        //     $this->agreement_file = $path;
        // }

        $this->sponser->update([
            'organization' => $this->organization,
            'status' => $this->status,
            'organization_type' => $this->organization_type,
            'email' => $this->email,
            'phone' => $this->phone,
            'area_of_collaboration' => $this->area_of_collaboration,
            // 'agreement_file' => $this->agreement_file,
            'sponsorship_level'=>$this->sponsorship_level,

            // Update other fields accordingly
        ]);
        if ($this->logo) {
            // Handle logo upload and update
            $this->sponser->update(['logo' => $this->logo->store('path/to/logo/folder', 'public')]);
        }
        // if ($this->agreement_file) {
        //     // Handle agreement_file upload and update
        //     $this->sponser->update(['agreement_file' => $this->agreement_file->store('path/to/document/folder', 'public')]);
        // }

        session()->flash('success', 'sponser updated successfully');
        return redirect()->route('sponsers.index');
    }

    public function render()
    {
        return view('livewire.sponsers.show', [
            'Organizations'=>Organizations::getValues(),
            'Status' => Status::getValues()
        ]);
    }

}
