<?php

namespace App\Livewire\Chapters;

use App\Models\Chapter;
use Livewire\Component;

class Index extends Component
{
    public string $search = '';


    public function delete(Chapter $chapter){
        $chapter->delete();
        session()->flash('success','chapter ' .$chapter->title. ' successfully',) ;
        return redirect()->route('chapters.index');
    }

    public function render()
    {
        return view('livewire.chapters.index',[
            'chapterList'=>Chapter::search($this->search)->latest()->paginate(5),
        ]);
    }
}
