<?php

namespace App\Livewire;

use Livewire\Component;



use App\Models\Subscriber as ModelSubscriber;
class Subscriber extends Component
{
    public function render()
    {
        return view('livewire.subscriber',[
            'subscriberList'=>ModelSubscriber::latest()->paginate(10),
        ]);
    }
}
