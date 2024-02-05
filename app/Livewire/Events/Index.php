<?php

namespace App\Livewire\Events;

use App\Models\EventProgram;
use Livewire\Component;

class Index extends Component
{
    public string $search = '';


    public function delete($eventId){
        $event = EventProgram::findOrFail($eventId);
        $eventTitle = $event ? $event->title : 'Unknown';
        $event->delete();
        session()->flash('success','Event ' .$event->title. ' successfully deleted',) ;
        return redirect()->route('events.index');
    }

    public function render()
    {
        return view('livewire.events.index',[
            'eventList'=>EventProgram::search($this->search)->latest()->paginate(5),
        ]);
    }

}
