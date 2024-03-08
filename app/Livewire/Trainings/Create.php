<?php

namespace App\Livewire\Trainings;

use App\Enums\TrainingType;
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

    #[Validate('required|max:50')]
    public $title;
    #[Validate('required')]
    public $trainingtype;

    #[Validate('required|min:50|max:65535')]
    public $description;

    #[Validate('nullable|image|mimes:jpeg,png,jpg,gif|max:7168')]
    public $image;

    #[Validate('nullable|boolean')]
    public $popular;

    #[Validate('required')]
    public $youtube_links = [];

    #[Validate('required')]
    public $trainer_id;

    public function addYoutubeLink()
    {
        $this->youtube_links[] = '';
    }

    public function create()
    {
    $validated = $this->validate([
        'title' => 'required|max:50',
        'description' => 'required|min:50|max:65535',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:7168',
        'popular' => 'nullable|boolean',
        'youtube_links.*' => 'required',
        'trainer_id' => 'required',        
        'trainingtype' =>'required|string',
    ]);

    // Upload and store the image
    $imageName = '';
    if ($this->image) {
        $imageName = time() . '.' . $this->image->extension();
        $this->image->storeAs('training', $imageName, 'public');
    }

    // Create the training
    $training = Training::create([
        'title' => $validated['title'],
        'trainingtype' => $validated['trainingtype'],
        'description' => $validated['description'],
        'image' => 'training/' . $imageName,
        'popular' => $validated['popular'] ?? false,
        'trainer_id' => $validated['trainer_id'],
        'youtube_links' => array_key_exists('youtube_links', $validated) ? json_encode($validated['youtube_links']) : null,
    ]);

    session()->flash('success', 'Training created successfully');
    return redirect()->route('trainings.index');
    }

    public function render()
    {
        return view('livewire.trainings.create', [
            'trainerList' => Trainer::latest()->get(),            
            'TrainingType' => TrainingType::getValues(),
    
            
        ]);
    }
}