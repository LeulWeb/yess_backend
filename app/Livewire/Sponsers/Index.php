<?php

namespace App\Livewire\Sponsers;

use App\Models\Sponser;
use Livewire\Component;

class Index extends Component
{

    public string $search = '';


    public function delete(Sponser $sponser)
    {
        $sponser->delete();
        session()->flash('success','sponser ' .$sponser->id. ' successfully',) ;
        return redirect()->route('$sponsers.index');
    }

    public function render()
    {
        return view('livewire.sponsers.index',
        [
            'sponserList' => Sponser::search($this->search)->latest()->paginate(5),
        ]);
    }


}
