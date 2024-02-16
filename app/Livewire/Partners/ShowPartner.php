<?php

namespace App\Livewire\Partners;

use App\Enums\Organizations;
use App\Enums\Status;
use App\Models\Partner;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\Attributes\Validate;
use Livewire\WithFileUploads;
use Livewire\Attributes\Title;
#[Title('Partners')]

class ShowPartner extends Component

{
    use WithFileUploads;
    public Partner $partner;




    public string $logoName;

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

    #[Validate('required|email')]
    public $email;

    #[Validate('required|regex:/^\+(?:[0-9] ?){6,14}[0-9]$/')]
    public $phone;

    #[Validate('required|sometimes|file|mimes:doc,docx,pdf,txt|max:20480')]
    public $agreement_file;




    public bool $editMode = false;
    public function __construct()
{
    $this->partner = new Partner(); // Or however you initialize a Partner object
}


    public function toggleEdit()
    {
        $this->editMode = !$this->editMode;
    }

    public function mount(Partner $partner)
    {
        $this->partner = $partner;
        $this->organization = $partner->organization;
        $this->email = $partner->email;
        $this->phone = $partner->phone;
        $this->area_of_collaboration = $partner->area_of_collaboration;
        $this->agreement_file = $partner->agreement_file;
        $this->organization_type = $partner->organization_type;
        $this->status = $partner->status;
        $this->sponsorship_level = $partner->sponsorship_level;

        // Initialize $imageName and $logoName properties
        $this->logoName = '';
        $this->logoName = $this->logoName ?: $partner->logo;
    }

    public function delete()
    {
        $this->partner->delete();
        session()->flash('success', 'Partner ' . $this->partner->email  . ' deleted successfully');
        return redirect()->route('partners.index');
    }

    public function update()
    {
        $validatedData = $this->validate([
            'organization_type' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|string',
            'area_of_collaboration' => 'nullable',
            'sponsorship_level' => 'nullable|string',
        ]);

        $this->partner->update($validatedData);

        if ($this->logo instanceof \Illuminate\Http\UploadedFile) {
            $path = $this->logo->store('path/to/logo/folder', 'public');
            $this->partner->update(['logo' => $path]);
        }

        if ($this->agreement_file instanceof \Illuminate\Http\UploadedFile) {
            $path = $this->agreement_file->store('path/to/agreement/folder', 'public');
            $this->partner->update(['agreement_file' => $path]);
        }

        session()->flash('success', 'Partner updated successfully');
        return redirect()->route('partners.index');
    }

    public function cancel()
    {
        return redirect()->route('partners.index');
    }

    public function downloadAgreement()
    {
        if ($this->partner->agreement_file) {
            $filePath = 'path/to/agreement/folder/' . $this->partner->agreement_file;
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
        if ($this->partner->agreement_file) {
            $filePath = 'path/to/agreement/folder/' . $this->partner->agreement_file;
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
        return view('livewire.partners.show-partner', [
            'Organizations' => Organizations::getValues(),
            'Status' => Status::getValues()
        ]);
    }
}

