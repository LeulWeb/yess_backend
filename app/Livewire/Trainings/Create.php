<?php

namespace App\Livewire\Trainings;

use App\Enums\TrainingType;
use App\Models\Chapter;
use App\Models\Trainer;
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
     
     public $chapterIds;
    #[Validate('required|max:50')]
    public $title;
    #[Validate('required|min:50|max:65535')]
    public $description;


    #[Validate('nullable|image|mimes:jpeg,png,jpg,gif|max:7168')]
    public $image;

    #[Validate('nullable|boolean')]
    public $popular;
    #[Validate('required')]
    public $youtube_links;



    #[Validate('required')]
    public $trainer_id;

    public function create()
    {
        $validated = $this->validate();
    
        if (!empty($this->image)) {
            $this->imageName = time() . '.' . $this->image->extension();
            $this->image->storeAs('training', $this->imageName, 'public');
        }
    
        $validated['image'] = 'training/' . $this->imageName;
    
        $training = Training::create($validated);
    
        // Ensure $this->chapterIds is an array
        if (!is_array($this->chapterIds)) {
            // If it's a JSON string, convert it to an array
            if (is_string($this->chapterIds) && is_array(json_decode($this->chapterIds, true))) {
                $this->chapterIds = json_decode($this->chapterIds, true);
            } else {
                // Handle the case where $this->chapterIds is not an array
                // For example, you might want to set it to an empty array or throw an exception
                $this->chapterIds = [];
            }
        }
    
        foreach ($this->chapterIds as $chapterData) {
            $training->chapters()->create($chapterData);
        }
    
        session()->flash('success', 'Training with Chapters created successfully');
        return redirect()->route('trainings.index');
    }
    
    public function cancel()
    {
        return redirect()->route('trainings.index');
    }


    public function render()
    {
        return view('livewire.trainings.create', [
            'trainerList' => Trainer::latest()->get(),
            'chapters' => Chapter::all(),
        ]);
    }
}