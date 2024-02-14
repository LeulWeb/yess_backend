<?php

namespace App\Livewire\JobRequest;

use App\Models\JobRequest;
use Livewire\Component;
use Livewire\Attributes\Title;
#[Title('Job Request')]

class Index extends Component
{
    public string $search = '';


    public function delete(JobRequest $JobRequest){
        $JobRequest->delete();
        session()->flash('success','Deleted  ' .$JobRequest->name. ' successfully',) ;
        return redirect()->route('job-request.index');
    }
    // public function cancel()
    // {
    //    return redirect()->route('JobRequests.index');
    //  }

    public function render()
    {
        return view('livewire.job-request.index',
    ['JobRequestList'=>JobRequest::search($this->search)->latest()->paginate(5),]);
    }
}
