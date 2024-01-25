<?php

namespace App\Livewire\Partners;

use App\Enums\Organizations;
use App\Enums\Status;
use App\Models\Partner;
use Livewire\Component;
use Livewire\Attributes\Validate;
use Livewire\WithFileUploads;

class ShowPartner extends Component
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
    #[Validate('required|max:50')]
    public $area_of_collaboration;

    #[Validate('required|email|unique:partners,email')]
    public $email;
    #[Validate('required|regex:/^\+(?:[0-9] ?){6,14}[0-9]$/')]
    public $phone;
    #[Validate('required|sometimes|file|mimes:doc,docx,pdf,txt|max:20480')]
    public $agreement_file;

    public Partner $partner;


    public bool $editMode = false;


    public function toggleEdit(){
        $this->editMode = !$this->editMode;
    }


    public function mount(Partner $partner)
    { $this->organization = $partner->organization;
        $this->email = $partner->email;
        $this->phone = $partner->phone;
        $this->area_of_collaboration = $partner->area_of_collaboration;
        $this->agreement_file = $partner->agreement_file;
        $this->organization_type = $partner->organization_type;
        $this->status = $partner->status;

        // Initialize $imageName and $logoName properties
           $this->logoName = '';
        $this->logoName = $this->logoName ?: $partner->logo;
    }


    public function delete()
    {
        $this->partner->delete();
        session()->flash('success', 'partner '. $this->partner->name  .' deleted successfully');
        return redirect()->route('partners.index');
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
            // Add more validation rules as needed

        ]);
        // if ($this->agreement_file) {
        //     $path = $this->agreement_file->store('path/to/document/files');
        //     $this->agreement_file = $path;
        // }

        $this->partner->update([
            'organization' => $this->organization,
            'status' => $this->status,
            'organization_type' => $this->organization_type,
            'email' => $this->email,
            'phone' => $this->phone,
            'area_of_collaboration' => $this->area_of_collaboration,
            'agreement_file' => $this->agreement_file,

            // Update other fields accordingly
        ]);
        if ($this->logo) {
            // Handle logo upload and update
            $this->partner->update(['logo' => $this->logo->store('path/to/logo/folder', 'public')]);
        }
        if ($this->agreement_file) {
            // Handle agreement_file upload and update
            $this->partner->update(['agreement_file' => $this->agreement_file->store('path/to/document/folder', 'public')]);
        }

        session()->flash('success', 'partner updated successfully');
        return redirect()->route('partners.index');
    }

    public function render()
    {
        return view('livewire.partners.show-partner', [
            'Organizations'=>Organizations::getValues(),
            'Status' => Status::getValues()
        ]);
    }

}
