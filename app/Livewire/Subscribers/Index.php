<?php

namespace App\Livewire\Subscribers;

use App\Models\subscriber;
use Livewire\Component;
use Livewire\Attributes\Title;
#[Title('Subscribers ')]

class Index extends Component
{

    public string $search = '';


    public function delete(subscriber $subscriber){
        $subscriber->delete();
        session()->flash('success','subscriber ' .$subscriber->name. ' successfully',) ;
        return redirect()->route('subscribers.index');
    }
    public function cancel()
    {
       return redirect()->route('subscribers.index');
     }

    public function render()
    {
        return view('livewire.subscribers.index',[
            'subscriberList'=>subscriber::search($this->search)->latest()->paginate(5),
        ]);
    }
}
