<?php

namespace App\Livewire\ScholarshipRequest;

use App\Models\ScholarshipRequest;
use Livewire\Component;

class Index extends Component
{
    public string $search = '';


    public function delete(ScholarshipRequest $scholarshipRequest){
        $scholarshipRequest->delete();
        session()->flash('success','scholarshipRequest ' .$scholarshipRequest->title. ' successfully',) ;
        return redirect()->route('scholarship-request.index');
    }
    public function cancel()
    {
       return redirect()->route('scholarshipRequests.index');
     }
    public function render()
    {
        return view('livewire.scholarship-request.index',[
            'scholarshipRequestList'=>ScholarshipRequest::search($this->search)->latest()->paginate(5),
        ]);
    }
}
