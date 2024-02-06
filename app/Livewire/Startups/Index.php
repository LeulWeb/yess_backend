<?php
namespace App\Livewire\Startups;

use App\Models\Startup;
use Livewire\Component;

class Index extends Component
{

    public string $search = '';


    public function delete(Startup $startup){
        $startup->delete();
        session()->flash('success','Startup ' .$startup->name. ' successfully',) ;
        return redirect()->route('startups.index');
    }
    public function cancel()
    {
       return redirect()->route('startups.index');
     }

    public function render()
    {
        return view('livewire.startups.index',[
            'startupList'=>Startup::search($this->search)->latest()->paginate(5),
        ]);
    }
}
