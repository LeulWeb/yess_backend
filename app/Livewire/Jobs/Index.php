<?php

namespace App\Livewire\Jobs;

use App\Models\Job;
use Livewire\Component;
use Livewire\Attributes\Title;
#[Title('Jobs')]

class Index extends Component
{
    public string $search = '';


    public function delete(Job $job){
        $job->delete();
        session()->flash('success','job ' .$job->title. ' successfully',) ;
        return redirect()->route('jobs.index');
    }
    public function cancel()
        {
        return redirect()->route('jobs.index');
        }

    public function render()
    {
        return view('livewire.jobs.index',[
            'jobList'=>Job::search($this->search)->latest()->paginate(5),
        ]);
    }
}

