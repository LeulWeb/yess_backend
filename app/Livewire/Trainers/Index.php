<?php

namespace App\Livewire\Trainers;

use App\Models\Trainer;
use Livewire\Component;

class Index extends Component
{

    public string $search = '';


    public function delete(Trainer $trainer){
        $trainer->delete();
        session()->flash('success','trainer ' .$trainer->name. ' successfully',) ;
        return redirect()->route('trainers.index');
    }

    public function render()
    {
        return view('livewire.trainers.index',[
            'trainerList'=>trainer::search($this->search)->latest()->paginate(5),
        ]);
    }
}
