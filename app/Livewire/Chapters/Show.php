<?php

namespace App\Livewire\Chapters;

use App\Models\Chapter;
use App\Models\Training;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Show extends Component
{
   #[Validate('required|min:50|max:65535')]
    public $description;

    #[Validate('required|max:100')]
    public $title;

    #[Validate('required|url')]
    public $youtube_links;   


    public Chapter $chapter;


    public bool $editMode = false;


    public function toggleEdit()
    {
        $this->editMode = !$this->editMode;
    }


    public function mount(Chapter $chapter)
    {
        $this->description = $chapter->description;
        $this->title = $chapter->title;
        $this->youtube_links = $chapter->youtube_links;
        
    }


    public function delete()
    {
        $this->chapter->delete();
        session()->flash('success', 'chapter ' . $this->chapter->name  . ' deleted successfully');
        return redirect()->route('chapters.index');
    }
    
    public function update()
    {
        $this->validate([
            // Add validation rules for your fields here
            'description' => 'required|string',
            
            'title' => 'required|string|max:255',
            'youtube_links' => 'nullable|array',
            'youtube_links.*' => 'nullable|url',
            
            // Add more validation rules as needed
        ]);
    
        $this->chapter->update([
            'description' => $this->description,
            'title' => $this->title,
            'youtube_links' =>$this->youtube_links,
            
        ]);
    
        // Update youtube_links separately
        foreach ($this->youtube_links as $index => $link) {
            $this->chapter->youtube_links[$index] = $link;
        }   
        
    
        $this->chapter->save();
    
        session()->flash('success', 'chapter updated successfully');
        return redirect()->route('chapters.index');
    }
    public function cancel()
    {
        return redirect()->route('chapters.index');
    }


    public function render()
    {
        return view('livewire.chapters.show', [
            'trainingList' => Training::latest()->get()
        ]);
    }
}