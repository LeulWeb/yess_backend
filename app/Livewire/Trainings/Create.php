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
         
     public $chapterIds =[];
    #[Validate('required|max:50')]
    public $title;
    #[Validate('required|min:50|max:65535')]
    public $description;


    #[Validate('nullable|image|mimes:jpeg,png,jpg,gif|max:7168')]
    public $image;

    #[Validate('nullable|boolean')]
    public $popular;
    #[Validate('required|url')]
    public $youtube_links;



    #[Validate('required')]
    public $trainer_id;
    public $chapterTitles = [];

    public function mount()
    {
        $this->chapterTitles = Chapter::pluck('title', 'id')->toArray();
    }

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
        foreach ($this->chapterIds as $chapterId) {
            $chapter = Chapter::find($chapterId);
            if ($chapter) {
                // Use save() instead of attach() for one-to-many relationships
                $training->chapters()->save($chapter);
            }
       
    
        session()->flash('success', 'Training with Chapters created successfully');
        return redirect()->route('trainings.index');
    }
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