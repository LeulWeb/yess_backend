<?php

namespace App\Livewire\Sponsers;

use App\Enums\Organizations;
use App\Enums\Status;
use App\Models\Sponser;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\Attributes\Validate;
use Livewire\WithFileUploads;
use Livewire\Attributes\Title;
#[Title('Sponsers ')]

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
    #[Validate('required|file|mimes:doc,docx,pdf,txt|max:20480')]
    public $agreement_file;

    public Sponser $sponser;


    public bool $editMode = false;
    public function __construct()
    {
        $this->sponser = new sponser(); // Or however you initialize a sponser object
    }


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
            'organization' => 'nullable',
            'status' => 'required|string',
            'organization_type' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|string',
             'area_of_collaboration' => 'nullable',
             'agreement_file' => 'nullable|file|mimes:doc,docx,pdf,txt|max:20480',
             'sponsorship_level' => 'nullable|string',
              // Add more validation rules as needed

        ]);
        // if ($this->agreement_file) {
        //     $path = $this->agreement_file->store('path/to/logo/files');
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
            $this->logo->store('path/to/logo/folder', 'public');
            $this->sponser->update(['logo' => $this->logo->hashName()]);
        }

        if ($this->agreement_file) {
            // Handle agreement_file upload and update
            $this->agreement_file->store('path/to/agreement/folder', 'public');
            $this->sponser->update(['agreement_file' => $this->agreement_file->hashName()]);
        }
        session()->flash('success', 'sponser updated successfully');
        return redirect()->route('sponsers.index');
    }
    public function cancel()
    {
       return redirect()->route('sponsers.index');
     }
     public function downloadAgreement()
     {
         if ($this->sponser->agreement_file) {
             $filePath = 'path/to/agreement/folder/' . $this->sponser->agreement_file;
             if (Storage::exists($filePath)) {
                 return response()->download(storage_path('app/public/' . $filePath));
             } else {
                 // Handle the case when the file doesn't exist
                 // For example, you can display an error message
                 return back()->with('error', 'The agreement file does not exist.');
             }
         }
     }

     public function openAgreement()
     {
         if ($this->sponser->agreement_file) {
             $filePath = 'path/to/agreement/folder/' . $this->sponser->agreement_file;
             if (Storage::exists($filePath)) {
                 $fileUrl = Storage::url($filePath);
                 return redirect()->away($fileUrl);
             } else {
                 // Handle the case when the file doesn't exist
                 // For example, you can display an error message
                 return back()->with('error', 'The agreement filedoes not exist.');
             }
         }
     }

    public function render()
    {
        return view('livewire.sponsers.show', [
            'Organizations'=>Organizations::getValues(),
            'Status' => Status::getValues()
        ]);
    }

}
