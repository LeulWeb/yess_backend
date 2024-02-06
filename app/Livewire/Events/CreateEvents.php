<?php

namespace App\Livewire\Events;

use App\Models\EventProgram;
use Livewire\Component;
use Livewire\Attributes\Validate;

class CreateEvents extends Component

    //target_audience coord location date description title
    {
        #[Validate('required|max:50')]
        public $title;
        #[Validate('required|min:50|max:65535')]
        public $description;
        #[Validate('required|max:1024')]
        public $target_audience;

        #[Validate('required|date')]
        public $date;
        #[Validate('nullable|max:1024')]
        public $coord;
        #[Validate('required|max:1024')]
        public $location;


        public function create()
        {
            $validated = $this->validate();

            EventProgram::create($validated);
            session()->flash('success', 'Events created successfully');
            return redirect()->route('events.index');
        }
        public function cancel()
        {
        return redirect()->route('events.index');
        }

        public function render()
        {
        return view('livewire.events.create-events');
        }
    }
    // public function render()
    // {
    //     return view('livewire.events.create-events');
    // }

