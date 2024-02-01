<?php

namespace App\Livewire\Sponsers;

use App\Enums\Organizations;
use App\Enums\Status;
use App\Models\Sponser;
use Livewire\Component;
use Livewire\Attributes\Validate;
use Livewire\WithFileUploads;
class Create extends Component
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

    public function create()
    {
        $validated = $this->validate();

        if(!empty($this->logo)){
            $this->logoName = time().'.'.$this->logo->extension();
            $this->logo->storeAs('sponser', $this->logoName, 'public');
        }

        $validated['logo']= 'sponser/'.$this->logoName;

        if($this->agreement_file){
            $validated['agreement_file']=  $this->agreement_file->store('sponser','public');
            // $this->imageName = time().'.'.$this->agreement_file->extension();
            // $this->agreement_file->storeAs('sponser', $this->imageName, 'public');
        }

        // $validated['agreement_file']= 'sponser/'.$this->imageName;

        Sponser::create($validated);
        session()->flash('success', 'sponser created successfully');
        return redirect()->route('sponsers.index');
    }

    public function render()
    {
        return view('livewire.sponsers.create', [
            'Organizations' => Organizations::getValues(),
            'Status' => Status::getValues(),

        ]);
    }

}
