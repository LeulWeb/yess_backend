<?php

namespace App\Livewire;

use Livewire\Component;

class Faq extends Component
{


    public $title = 'FAQ';


    


    public function render()
    {
        return view('livewire.faq', ['title' => $this->title]);
    }
}
