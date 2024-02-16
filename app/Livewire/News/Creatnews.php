<?php

namespace App\Livewire\News;

use App\Models\News;
use App\Models\subscriber;
use App\Notifications\NewContentNotification;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\Attributes\Validate;
use Livewire\Attributes\Title;
#[Title('News')]

class Creatnews extends Component
{
    use WithFileUploads;

    public string $imageName = '';
    public string $logoName = '';

    #[Validate('required|max:50')]
    public $title;

    #[Validate('required')]
    public $description;

    #[Validate('required|image|mimes:jpeg,png,jpg,gif|max:7168')]
    public $logo;

    #[Validate('required|image|mimes:jpeg,png,jpg,gif|max:7168')]
    public $thumbnail;

    #[Validate('required|max:500000')]
    public $featured;

    #[Validate('boolean|nullable')]
    public $is_visible;

    #[Validate('required|max:100')]
    public $author;

    #[Validate('required|date|unique:news,date')]
    public $date;

    #[Validate('nullable|url')]
    public $links;

    #[Validate('required|max:20000')]
    public $tags;

    public function create()
    {
        $validated = $this->validate();

        if (!empty($this->thumbnail)) {
            $this->imageName = time().'.'.$this->thumbnail->extension();
            $this->thumbnail->storeAs('new', $this->imageName, 'public');
        }

        if (!empty($this->logo)) {
            $this->logoName = time().'.'.$this->logo->extension();
            $this->logo->storeAs('new', $this->logoName, 'public');
        }

        $validated['logo'] = 'new/'.$this->logoName;
        $validated['image'] = 'new/'.$this->imageName;

        $news = News::create($validated);

        // Send notification to subscribers
        $subscribers = subscriber::all();
        foreach ($subscribers as $subscriber) {
            $subscriber->notify(new NewContentNotification($news));
        }

        session()->flash('success', 'News created successfully');
        return redirect()->route('news.index');
    }

    public function cancel()
    {
        return redirect()->route('news.index');
    }

    public function render()
    {
        return view('livewire.news.creatnews');
    }
}
