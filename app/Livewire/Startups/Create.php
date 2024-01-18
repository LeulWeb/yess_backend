<?php

namespace App\Livewire\Startups;

use App\Models\Startup;
use Livewire\Component;
use App\Enums\JobSector;
use Livewire\WithFileUploads;
use Livewire\Attributes\Validate;

class Create extends Component
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


    // #[Validate('between:1,100000')]
    public $employees;

    #[Validate('required|max:100')]
    public $founder;

    #[Validate('required|email|unique:startups,contact_email')]
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


    public function create()
    {
        $validated = $this->validate();


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


        Startup::create($validated);
        session()->flash('message', 'Startup created successfully');
        return redirect()->route('startups.index');
    }


    public function render()
    {
        return view('livewire.startups.create', [
            'JobSectors' => JobSector::getValues()
        ]);
    }
}
