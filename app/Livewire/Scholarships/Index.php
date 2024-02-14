<?php

namespace App\Livewire\Scholarships;

use App\Models\Scholarship;
use Livewire\Component;
use Livewire\Attributes\Title;
#[Title('Scholarships ')]

class Index extends Component

{

    public string $search = '';


    public function delete(Scholarship $scholarship){
        $scholarship->delete();
        session()->flash('success','scholarship ' .$scholarship->title. ' successfully',) ;
        return redirect()->route('scholarships.index');
    }
    public function cancel()
    {
       return redirect()->route('scholarships.index');
     }

    public function render()
    {
        return view('livewire.scholarships.index',[
            'scholarshipList'=>Scholarship::search($this->search)->latest()->paginate(5),
        ]);
    }
}
