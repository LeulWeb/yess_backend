<?php

namespace App\Livewire;

use App\Models\Scholarship;
use Livewire\Component;

class ScholarshipView extends Component
{

    public $scholarship;

    public function mount($id){
        $this->scholarship = Scholarship::findOrFail($id);
    }

    public function render()
    {
        return view('livewire.scholarship-view', [
            'scholarship' => $this->scholarship
        ]);
    }
}
