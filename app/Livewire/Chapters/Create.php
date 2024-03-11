<?php

namespace App\Livewire\Chapters;

use App\Models\Chapter;
use App\Models\Training;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Create extends Component
{
    #[Validate('required|max:50')]
    public $title;
    #[Validate('required|min:50|max:65535')]
    public $description;

    #[Validate('required')]
    public $youtube_links;



    #[Validate('required')]
    public $training_id;
    public function create()
    {
        $validated = $this->validate();
        Chapter::create($validated);
        session()->flash('success', 'chapter created successfully');
        return redirect()->route('chapters.index');
    }
    public function cancel()
    {
        return redirect()->route('chapters.index');
    }


    public function render()
    {
        return view('livewire.chapters.create', [
            'trainingList' => Training::latest()->get()
        ]);
    }
}
