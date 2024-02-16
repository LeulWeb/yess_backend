<?php

namespace App\Livewire\Blogs;

use App\Models\Blog;
use App\Models\subscriber;
use App\Notifications\NewContentNotification;
use Livewire\Component;
use Livewire\Attributes\Validate;
use Livewire\WithFileUploads;
use Livewire\Attributes\Title;
#[Title('blogs')]

class Create extends Component

{
    use WithFileUploads;
    public String $imageName = '';

    #[Validate('required|max:50')]
    public $title;
    #[Validate('required|max:65535')]
    public $content;

    #[Validate('required|max:7168')]
    public $author;
    #[Validate('required|image|mimes:jpeg,png,jpg,gif|max:7168')]

    public $image;

    #[Validate('nullable|max:7168')]
     public $category;

    #[Validate('required')]
    public $tag;

    public function create()
    {
        $validated = $this->validate();
        if(!empty($this->image)){
            $this->imageName = time().'.'.$this->image->extension();
            $this->image->storeAs('blog', $this->imageName, 'public');
        }

       $blogs = Blog::create($validated);
        $subscribers = subscriber::all();
        foreach ($subscribers as $subscriber) {
        $subscriber->notify(new NewContentNotification($blogs));
    }
        session()->flash('success', 'blog created successfully');
        return redirect()->route('blogs.index');
    }
    public function cancel()
        {
        return redirect()->route('blogs.index');
        }
    public function render()
    {
        return view('livewire.blogs.create');
    }



}
