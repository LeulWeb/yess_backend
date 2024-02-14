<?php

namespace App\Livewire\News;

use App\Models\News;
use Livewire\Component;
use Livewire\Attributes\Title;
#[Title('News')]

class Index extends Component
{
    public string $search = '';


    public function delete(News $new){
        $new->delete();
        session()->flash('success','news ' .$new->author. ' successfully',) ;
        return redirect()->route('news.index');
    }
    public function cancel()
        {
        return redirect()->route('news.index');
        }


    public function render()
    {
        return view('livewire.news.index',[
            'newList'=>News::search($this->search)->latest()->paginate(5),
        ]);
    }

}
