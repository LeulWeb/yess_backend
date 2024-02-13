<?php

namespace App\Livewire\VolunteerApplication;

use App\Models\VolunteerApplication;
use Livewire\Component;

class Index extends Component


    {
        public string $search = '';


        public function delete(VolunteerApplication $volunteerApplication){
            $volunteerApplication->delete();
            session()->flash('success','Volunteer Applecation ' .$volunteerApplication->title. ' Deleted  Successfully',) ;
            return redirect()->route('volunteer-application.index');
        }
        // public function cancel()
        // {
        //    return redirect()->route('scholarshipRequests.index');
        //  }
         public function render()
    {
        return view('livewire.volunteer-application.index',[
                'volunteerapplicationList'=>VolunteerApplication::search($this->search)->latest()->paginate(5),
            ]);
        }
    }

