<?php

namespace App\Livewire\Trainings;

use App\Models\Training;
use Livewire\Component;
use Livewire\Attributes\Title;
#[Title('Training ')]

class Index extends Component
{

    public string $search = '';


    public function delete(Training $training){
        $training->delete();
        session()->flash('success','training ' .$training->title. ' successfully',) ;
        return redirect()->route('trainings.index');
    }

    public function render()
    {
        return view('livewire.trainings.index',[
            'trainingList' => Training::with('chapters')->search($this->search)->latest()->paginate(5),
        ]);
    }
}
