<?php

namespace App\Livewire\Chapters;

use App\Models\Chapter;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Create extends Component
{

    public String $imageName = '';

    #[Validate('required|max:50')]
    public $title;
    #[Validate('required|min:50|max:65535')]
    public $description;
    #[Validate('required')]
    public $youtube_links = [];

    #[Validate('required')]
    public $training_id;

    public function addYoutubeLink()
    {
        $this->youtube_links[] = '';
    }

    public function create()
    {
    $validated = $this->validate([
        'title' => 'required|max:50',
        'description' => 'required|min:50|max:65535',        
        'youtube_links.*' => 'required',
        'training_id' => 'required',        
        
    ]);

    // Create the chapter
    $chapter = Chapter::create([
        'title' => $validated['title'],        
        'description' => $validated['description'],        
        'training_id' => $validated['training_id'],
        'youtube_links' => json_encode($validated['youtube_links']),
    ]);

    session()->flash('success', 'chapter created successfully');
    return redirect()->route('chapters.index');
    }

    public function render()
    {
        return view('livewire.chapters.create', [
            'trainingList' => Chapter::latest()->get(),            
            
    
            
        ]);
    }
}