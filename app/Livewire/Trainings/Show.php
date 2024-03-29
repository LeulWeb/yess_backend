<?php

namespace App\Livewire\Trainings;

use App\Models\Chapter;
use App\Models\Trainer;
use Livewire\Component;
use App\Models\Training;
use Livewire\WithFileUploads;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;

#[Title('Training ')]

class Show extends Component
{

    use WithFileUploads;


    public ?string $imageName;


    #[Validate('required|min:50|max:65535')]
    public $description;



    #[Validate('nullable|image|mimes:jpeg,png,jpg,gif|max:7168')]
    public $image;





    #[Validate('required|max:100')]
    public $title;

    #[Validate('nullable|url')]
    public $youtube_links;
    #[Validate('nullable|boolean')]
    public $popular;


    public Training $training;


    public bool $editMode = false;


    public function toggleEdit()
    {
        $this->editMode = !$this->editMode;
    }


    public function mount(Training $training)
    {
        $this->description = $training->description;


        $this->title = $training->title;


        $this->youtube_links = $training->youtube_links;
        $this->popular = $training->popular;


        // Initialize $imageName and $logoName properties
        $this->imageName = '';


        $this->imageName = $this->imageName ?: $training->image;
    }


    public function delete()
    {
        $this->training->delete();
        session()->flash('success', 'training ' . $this->training->name  . ' deleted successfully');
        return redirect()->route('trainings.index');
    }



    public function update()
    {
        $this->validate([
            // Add validation rules for your fields here

            'description' => 'required|string',
            'image' => 'nullable|file',

            'title' => 'required|string|max:255',

            'youtube_links' => 'nullable|url',
            'popular' => 'nullable|boolean',

            // Add more validation rules as needed
        ]);

        $this->training->update(
            [
                'description' => $this->description,

                'title' => $this->title,

                'youtube_links' => $this->youtube_links,
                'popular' => $this->popular,


            ]
        );

        if ($this->image) {
            // Handle image upload and update
            $this->training->update(['image' => $this->image->store('path/to/image/folder', 'public')]);
        }



        session()->flash('success', 'training updated successfully');
        return redirect()->route('trainings.index');
    }
    public function cancel()
    {
        return redirect()->route('trainings.index');
    }


    public function render()
    {
        return view('livewire.trainings.show', [
            'trainerList' => Trainer::latest()->get(),
            'chapterList' => Chapter::latest()->get()
        ]);
    }
}
