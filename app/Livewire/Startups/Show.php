<?php

namespace App\Livewire\Startups;

use App\Enums\JobSector;
use App\Models\Startup;
use Livewire\Component;
use Livewire\Attributes\Validate;
use Livewire\WithFileUploads;

class Show extends Component
{

    use WithFileUploads;


    public String $imageName;
    public String $logoName;

    #[Validate('required|max:50')]
    public $name;
    #[Validate('required|min:50|max:65535')]
    public $description;

    #[Validate('nullable|image|mimes:jpeg,png,jpg,gif|max:7168')]
    public $logo;

    #[Validate('nullable|image|mimes:jpeg,png,jpg,gif|max:7168')]

    public $image;

    #[Validate('required')]
    public $sector;


    #[Validate('required|max:50')]
    public $product_service;


    #[Validate('numeric|between:1,100000')]
    public $employees;

    #[Validate('required|max:100')]
    public $founder;




    // !
    // skip the update email error
    // #[Validate('required|email|unique:startups,contact_email')]
    #[Validate('required|email')]
    public $contact_email;


    #[Validate('required|regex:/^\+(?:[0-9] ?){6,14}[0-9]$/')]
    public $contact_phone;


    #[Validate('nullable|max:200')]
    public $location;

    #[Validate('nullable|url')]
    public $website;

    #[Validate('nullable|regex:/^(https?:\/\/)?(www\.)?facebook\.com\/.+/i')]
    public $facebook;


    #[Validate('nullable|regex:/^(https?:\/\/)?(www\.)?linkedin\.com\/.+/i')]
    public $linkedin;


    #[Validate('nullable|regex:/^(https?:\/\/)?t\.me\/.+/i')]
    public $telegram;

    public Startup $startup;


    public bool $editMode = false;


    public function toggleEdit(){
        $this->editMode = !$this->editMode;
    }


    public function mount(Startup $startup)
    {
        $this->startup = $startup;
        $this->name = $startup->name;
        $this->description = $startup->description;

        $this->sector = $startup->sector;
        $this->product_service = $startup->product_service;
        $this->employees = $startup->employees;
        $this->founder = $startup->founder;
        $this->contact_email = $startup->contact_email;
        $this->contact_phone = $startup->contact_phone;
        $this->location = $startup->location;
        $this->website = $startup->website;
        $this->facebook = $startup->facebook;
        $this->linkedin = $startup->linkedin;
        $this->telegram = $startup->telegram;
        $this->imageName = $startup->image;
        $this->logoName = $startup->logo;
    }


    public function delete()
    {
        $this->startup->delete();
        session()->flash('success', 'Startup '. $this->startup->name  .' deleted successfully');
        return redirect()->route('startups.index');
    }



    public function update(){
        $this->validate();

        if(!empty($this->image)){
            $this->imageName = time().'.'.$this->image->extension();
            $this->image->storeAs('startup', $this->imageName, 'public');
        }

        if(!empty($this->logo)){
            $this->logoName = time().'.'.$this->logo->extension();
            $this->logo->storeAs('startup', $this->logoName, 'public');
        }

        $validated['logo']= 'startup/'.$this->logoName;
        $validated['image']= 'startup/'.$this->imageName;



        // check the input fields and finish the update func

        session()->flash('success', 'Startup '. $this->startup->name  .' updated successfully');
        $this->editMode = false;

    }


    public function render()
    {
        return view('livewire.startups.show', [
            'JobSectors'=>JobSector::getValues()
        ]);
    }
}
