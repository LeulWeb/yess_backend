<?php

namespace App\Livewire\Youth;

use App\Models\Youth;
use Livewire\Component;

class Index extends Component
{
    public string $search = '';


    public function delete(Youth $youth){
        $youth->delete();
        session()->flash('success','youth ' .'deleted '. ' successfully',) ;
        return redirect()->route('youth.index');
    }
    public function cancel()
    {
    return redirect()->route('youth.index');
    }

    public function render()
    {
        return view('livewire.youth.index',[
              'youthList'=>Youth::search($this->search)->latest()->paginate(5),

        ]);
    }

}
