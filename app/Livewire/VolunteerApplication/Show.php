<?php

namespace App\Livewire\VolunteerApplication;

use App\Models\VolunteerApplication;
use Livewire\Component;
use Livewire\Attributes\Title;
#[Title('Volunteer Applications ')]

class Show extends Component
{
    public $message;
    public $status;
    public $phoneNumber;

    public VolunteerApplication $volunteerApplication;

    public function delete()
    {
        $this->volunteerApplication->delete();
        session()->flash('success', 'volunteerApplication '. $this->volunteerApplication->title  .' deleted successfully');
        return redirect()->route('volunteer-application.index');
    }
    public function render()
    {
        return view('livewire.volunteer-application.show');
    }
}
