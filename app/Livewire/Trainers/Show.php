<?php

namespace App\Livewire\Trainers;

use App\Models\Trainer;
use Livewire\Component;
use Livewire\Attributes\Validate;
use Livewire\WithFileUploads;

class Show extends Component
{

    use WithFileUploads;


    public String $imageName;


    #[Validate('required|max:50')]
    public $name;

    #[Validate('nullable|image|mimes:jpeg,png,jpg,gif|max:7168')]

    public $profile;

    #[Validate('required|email')]
    public $email;

    public Trainer $trainer;


    public bool $editMode = false;


    public function toggleEdit(){
        $this->editMode = !$this->editMode;
    }


    public function mount(Trainer $trainer)
    {

        $this->name = $trainer->name;
        $this->email = $trainer->email;


        // Initialize $imageName and $logoName properties
        $this->imageName = '';
        $this->imageName = $this->imageName ?: $trainer->profile;

    }


    public function delete()
    {
        $this->trainer->delete();
        session()->flash('success', 'trainer '. $this->trainer->name  .' deleted successfully');
        return redirect()->route('trainers.index');
    }



    public function update()
    {
        $this->validate([
            // Add validation rules for your fields here
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            

            // Add more validation rules as needed
        ]);

        $this->trainer->update([
            'name' => $this->name,
            'email' => $this->email,
            'profile' => $this->profile,

            // Update other fields accordingly
        ]);

        if ($this->profile) {
            // Handle image upload and update
            $this->trainer->update(['profile' => $this->profile->store('path/to/image/folder', 'public')]);
        }



        session()->flash('success', 'trainer updated successfully');
        return redirect()->route('trainers.index');
    }

    public function render()
    {
        return view('livewire.trainers.show', [

        ]);
    }
}
