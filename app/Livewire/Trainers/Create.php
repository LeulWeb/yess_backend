<?php

namespace App\Livewire\Trainers;

use App\Models\Trainer;
use Livewire\Component;
use Livewire\Attributes\Validate;
use Livewire\WithFileUploads;
use Livewire\Attributes\Title;
#[Title('Trainers ')]

class Create extends Component
{


    use WithFileUploads;


    public String $imageName = '';
    // public String $logoName;

    #[Validate('required|max:50')]
    public $name;
    #[Validate('nullable|image|mimes:jpeg,png,jpg,gif|max:7168')]
    public $profile;
    #[Validate('required|email|unique:trainers,email')]
    public $email;

    public function create()
    {
        $validated = $this->validate();


        if(!empty($this->profile)){
            $this->imageName = time().'.'.$this->profile->extension();
            $this->profile->storeAs('trainer', $this->imageName, 'public');
        }

        $validated['profile']= 'trainer/'.$this->imageName;

        Trainer::create($validated);
        session()->flash('success', 'trainer created successfully');
        return redirect()->route('trainers.index');
    }
    public function cancel()
    {
        return redirect()->route('trainers.index');
    }


    public function render()
    {
        return view('livewire.trainers.create', [

        ]);
    }
}
