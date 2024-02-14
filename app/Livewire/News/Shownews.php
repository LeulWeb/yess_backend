<?php

namespace App\Livewire\News;

use App\Models\News;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\Attributes\Validate;
use Livewire\Attributes\Title;
#[Title('News')]

class Shownews extends Component
{

    use WithFileUploads;
    public String $imageName = '';
        public string $logoName = '';

        #[Validate('required|max:50')]
        public $title;
        #[Validate('required|min:50|max:65535')]
        public $description;

        #[Validate('nullable|image|mimes:jpeg,png,jpg,gif|max:7168')]
        public $logo;

        #[Validate('nullable|image|mimes:jpeg,png,jpg,gif|max:7168')]

        public $thumbnail;

        #[Validate('required|max:50')]
        public $featured;


        #[Validate('boolean')]
         public $is_visible = true;

        #[Validate('required|max:100')]
        public $author;

        #[Validate('required|date|unique:news,date')]
        public $date;
        #[Validate('nullable|url')]
        public $links;
        #[Validate('nullable|max:200')]
        public $tags;

    public News $new;

    public bool $editMode = false;


    public function toggleEdit(){
        $this->editMode = !$this->editMode;
    }


    public function mount(News $new)
    {
        $this->new = $new;
        $this->title = $new->title;
        $this->description = $new->description;

        $this->author = $new->author;
        $this->is_visible = $new->is_visible;
        $this->tags = $new->tags;
        $this->featured = $new->featured;
        $this->links = $new->links;
        $this->date = $new->date;
        $this->logoName = $new->logo;
        $this->imageName =$new->thumbnail;
    }


    public function delete()
    {
        $this->new->delete();
        session()->flash('success', 'news '. $this->new->author  .' deleted successfully');
        return redirect()->route('news.index');
    }
    public function update()
    {
        $this->validate([
            // Add validation rules for your fields here
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'featured' => 'required|string',
            'is_visible' => 'required|boolean',
            'author' => 'required|string|max:255',
            'date' => 'required|date',
            'tags' => 'required|string',
            'links' => 'nullable|url',
                       // Add more validation rules as needed
        ]);

        $this->new->update([
            'title' => $this->title,
            'description' => $this->description,
            'featured' => $this->featured,
            'is_visible' => $this->is_visible,
            'author' => $this->author,
            'date' => $this->date,
            'links' => $this->links,
            'tags' => $this->tags,
            'links' => $this->links,

            // Update other fields accordingly
        ]);

        if ($this->thumbnail) {
            // Handle image upload and update
            $this->new->update(['thumbnail' => $this->thumbnail->store('path/to/image/folder', 'public')]);
        }

        if ($this->logo) {
            // Handle logo upload and update
            $this->new->update(['logo' => $this->logo->store('path/to/logo/folder', 'public')]);
        }

        session()->flash('success', 'new updated successfully');
        return redirect()->route('news.index');
    }
    public function cancel()
        {
        return redirect()->route('news.index');
        }


    public function render()
    {
        return view('livewire.news.shownews');
    }
}
