<?php

namespace App\Livewire\Blogs;

use App\Models\Blog;
use Livewire\Component;
use Livewire\Attributes\Validate;
use Livewire\WithFileUploads;

class Show extends Component
{
    use WithFileUploads;
    public String $imageName;
    #[Validate('required|max:50')]
    public $title;
    #[Validate('required|max:65535')]
    public $content;

    #[Validate('required|max:7168')]
    public $author;
    #[Validate('nullable|image|mimes:jpeg,png,jpg,gif|max:7168')]

    public $image;

    #[Validate('nullable|max:7168')]

    public $category;

    #[Validate('required')]
    public $tag;


    public Blog $blog;


    public bool $editMode = false;


    public function toggleEdit(){
        $this->editMode = !$this->editMode;
    }


    public function mount(Blog $blog)
    {   $this->blog = $blog;
        $this->title = $blog->title;
        $this->content = $blog->content;
        $this->author = $blog->author;
        $this->category = $blog->category;
        $this->tag = $blog->tag;

        $this->imageName = '';
         $this->imageName = $this->imageName ?: $blog->image;


    }

     public function delete()
    {
        $this->blog->delete();
        session()->flash('success', 'blog '. $this->blog->author  .' deleted successfully');
        return redirect()->route('blogs.index');
    }

    public function update()
    {
        $this->validate([
            // Add validation rules for your fields here
            'author' => 'required|string|max:255',
            'content' => 'required|string',
            'title' => 'required|string',
            'category' => 'required|string',
            'tag' => 'required|string',

            // Add more validation rules as needed
        ]);

        $this->blog->update([
            'author' => $this->author,
            'title' => $this->title,
            'content' => $this->content,
            'category' => $this->category,
            'tag' => $this->tag,
            // Update other fields accordingly
        ]);
        if ($this->image) {
            // Handle image upload and update
            $this->blog->update(['image' => $this->image->store('path/to/image/folder', 'public')]);
        }

        session()->flash('success', ' blog updated successfully');
        return redirect()->route('blogs.index');
    }
    public function cancel()
        {
        return redirect()->route('blogs.index');
        }


    public function render()
    {
        return view('livewire.blogs.show');
    }
}
