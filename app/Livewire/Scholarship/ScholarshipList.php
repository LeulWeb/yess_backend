<?php

namespace App\Livewire\Scholarship;

use App\Models\Scholarship;
use Livewire\Component;
use Livewire\Attributes\Title;

class ScholarshipList extends Component
{
    #[Title("YESS Scholarship")]


    public $keyword;

    public function render()
    {
        return view('livewire.scholarship.scholarship-list', [ 'scholarshipListings'=>Scholarship::search($this->keyword)->latest()->paginate(10),]);
    }
}
