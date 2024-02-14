<?php

namespace App\Livewire\ScholarshipRequest;

use App\Models\ScholarshipRequest;
use Livewire\Component;
use Livewire\Attributes\Title;
#[Title('Scholarships Request')]

class Show extends Component
{

    public $description;
    public $status;
    public $challenges;
    public $help_needed;
    public $title;
    public $deadline;
    public ScholarshipRequest $scholarshipRequest;

    public function delete()
    {
        $this->scholarship->delete();
        session()->flash('success', 'scholarshipRequest '. $this->scholarship->title  .' deleted successfully');
        return redirect()->route('scholarship-request.index');
    }
    // public function cancel()
    // {
    //    return redirect()->route('scholarships.index');
    //  }

    public function render()
    {
        return view('livewire.scholarship-request.show');
    }
}
