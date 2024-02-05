<?php

namespace App\Livewire\Scholarship;

use App\Models\Scholarship;
use Livewire\Component;

class ScholarshipView extends Component
{

public $scholarship;

public function mount($id)
{
    $this->scholarship = Scholarship::findOrFail($id);
}

public function render()
{
    return view('livewire.scholarship.scholarship-view', [
        'scholarship' => $this->scholarship
    ]);
}
}
