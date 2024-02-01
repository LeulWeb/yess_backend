<?php

namespace App\Livewire\Volunteers;

use App\Models\Volunteer;
use Livewire\Component;

class Index extends Component
{
        public string $search = '';


        public function delete(Volunteer $volunteer){
            $volunteer->delete();
            session()->flash('success' .$volunteer->title. ' successfully',) ;
            return redirect()->route('volunteers.index');
        }

        public function render()
        {
            return view('livewire.volunteers.index',[
                'volunteerList'=>Volunteer::search($this->search)->latest()->paginate(5),
            ]);
        }


}
