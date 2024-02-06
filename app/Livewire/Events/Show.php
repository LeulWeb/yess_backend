<?php

namespace App\Livewire\Events;

use App\Models\EventProgram;
use Livewire\Component;
use Livewire\Attributes\Validate;

class Show extends Component
{
    #[Validate('required|min:50|max:65535')]
    public $description;
    #[Validate('required|max:50')]
    public $title;
    #[Validate('required|max:1024')]
    public $target_audience;
    // !
    // skip the update email error
    // #[Validate('required|email|unique:events,contact_email')]


    #[Validate('required|')]
    public $date;


    #[Validate('nullable|max:200')]
    public $location;

    #[Validate('nullable')]
    public $coord;



    public EventProgram $event;


    public bool $editMode = false;


    public function toggleEdit(){
        $this->editMode = !$this->editMode;
    }


    public function mount(EventProgram $event)
    {
        $this->description = $event->description;

        $this->title = $event->title;

        $this->target_audience = $event->target_audience;

        $this->date = $event->date;
        $this->location = $event->location;
        $this->coord = $event->coord;


    }


    public function delete()
    {
        $this->EventProgram->delete();
        session()->flash('success', 'event '. $this->event->name  .' deleted successfully');
        return redirect()->route('events.index');
    }



    public function update()
    {
        $this->validate([
            // Add validation rules for your fields here

            'description' => 'required|string',

            'title' => 'required|string',

            'target_audience' => 'required|string',

            'date' => 'required|date',
            'location' => 'required|string',
            'coord' => 'nullable|string',

            // Add more validation rules as needed
        ]);

        $this->event->update([

            'description' => $this->description,

            'title' => $this->title,

            'target_audience' => $this->target_audience,

            'date' => $this->date,
            'location' => $this->location,
            'coord' => $this->coord,

            // Update other fields accordingly
        ]);



        session()->flash('success', 'event updated successfully');
        return redirect()->route('events.index');
    }
    public function cancel()
        {
        return redirect()->route('event.index');
        }

    public function render()
    {
        return view('livewire.events.show');
    }
}
