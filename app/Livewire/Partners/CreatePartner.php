<?php

namespace App\Livewire\Partners;
use App\Enums\Organizations;
use App\Enums\Status;
use App\Models\Partner;
use Livewire\Component;
use Livewire\Attributes\Validate;
use Livewire\WithFileUploads;


class CreatePartner extends Component
{



    use WithFileUploads;

    // public String $logoName;
    public string $logoName = '';
    public string $imageName = '';

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

    public function create()
    {
        $validated = $this->validate();

        if(!empty($this->logo)){
            $this->logoName = time().'.'.$this->logo->extension();
            $this->logo->storeAs('partner', $this->logoName, 'public');
        }

        $validated['logo']= 'partner/'.$this->logoName;

        if(!empty($this->agreement_file)){
            $this->imageName = time().'.'.$this->agreement_file->extension();
            $this->agreement_file->storeAs('partner', $this->imageName, 'public');
        }

        $validated['agreement_file']= 'partner/'.$this->imageName;

        Partner::create($validated);
        session()->flash('success', 'partner created successfully');
        return redirect()->route('partners.index');
    }

    public function render()
    {
        return view('livewire.partners.create-partner', [
            'Organizations' => Organizations::getValues(),
            'Status' => Status::getValues(),

        ]);
    }

}
