<?php

namespace App\Livewire\Startups;

use App\Models\Startup;
use Livewire\Component;

class Show extends Component
{


    public Startup $startup;


    public function mount(Startup $startup)
    {
        $this->startup = $startup;
    }


    public function delete()
    {
        $this->startup->delete();
        session()->flash('success', 'Startup '. $this->startup->name  .' deleted successfully');
        return redirect()->route('startups.index');
    }


    public function render()
    {
        return view('livewire.startups.show');
    }
}
