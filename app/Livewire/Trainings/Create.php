<?php

namespace App\Livewire\Trainings;

use App\Models\Training;
use Livewire\Component;
use Livewire\Attributes\Validate;
use Livewire\WithFileUploads;
use Livewire\Attributes\Title;
#[Title('Training ')]

class Create extends Component
{


    use WithFileUploads;


    public String $imageName = '';


    #[Validate('required|max:50')]
    public $title;
    #[Validate('required|min:50|max:65535')]
    public $description;


    #[Validate('nullable|image|mimes:jpeg,png,jpg,gif|max:7168')]
    public $image;

    #[Validate('nullable|boolean')]
    public $popular;
    #[Validate('required_without:playlist_link|url')]
    public $youtube_links;
    #[Validate('required_without:youtube_links|url')]
    public $playlist_link;




    public function create()
    {
        $validated = $this->validate();


        if(!empty($this->image)){
            $this->imageName = time().'.'.$this->image->extension();
            $this->image->storeAs('training', $this->imageName, 'public');
        }




        $validated['image']= 'training/'.$this->imageName;

        Training::create($validated);
        session()->flash('success', 'training created successfully');
        return redirect()->route('trainings.index');
    }
    public function cancel()
{
    return redirect()->route('trainings.index');
}


    public function render()
    {
        return view('livewire.trainings.create');
    }
}
