<?php

namespace App\Livewire\JobRequest;

use App\Models\JobRequest;
use Livewire\Component;
use Livewire\Attributes\Title;
#[Title('Job Request')]

class Show extends Component

    {
        
        public $position;
        public $linkedIn;
        public $resume;
        public $job_type;
        public $fieldOfStudy;
        public $educationLevel;
        public $is_visible;

        public JobRequest $jobRequest;


        public function delete()
        {
            $this->jobRequest->delete();
            session()->flash('success', 'jobRequest '. $this->jobRequest->position  .' deleted successfully');
            return redirect()->route('job-request.index');
        }
        // public function cancel()
        // {
        //    return redirect()->route('JobRequests.index');
        //  }



        public function render()

    {

        return view('livewire.job-request.show');
    }
    }

