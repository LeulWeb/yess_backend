<?php

namespace App\Livewire\Blogs;

use App\Models\Blog;
use Livewire\Attributes\Title;
use Livewire\Component;
#[Title('blogs')]

class Index extends Component
{

    public string $search = '';


    public function delete(Blog $blog){
        $blog->delete();
        session()->flash('success','blog ' .$blog->author. 'Deleted successfully',) ;
        return redirect()->route('blogs.index');
    }
    public function cancel()
        {
        return redirect()->route('blogs.index');
        }

    public function render()
    {
        return view('livewire.blogs.index',[
            'blogList'=>Blog::search($this->search)->latest()->paginate(5),
        ]);
    }
}
