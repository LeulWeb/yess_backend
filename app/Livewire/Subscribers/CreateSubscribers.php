<?php

namespace App\Livewire\Subscribers;

use App\Models\subscriber;
use Livewire\Component;
use Livewire\Attributes\Validate;

class CreateSubscribers extends Component
{


    #[Validate('required|max:50')]
    public $name;
    #[Validate('required|email|unique:subscribers,email')]
    public $email;
    public function create()
    {
        $validated = $this->validate();

        subscriber::create($validated);
        session()->flash('success', 'subscribers created successfully');
        return redirect()->route('subscribers.index');
    }
    public function cancel()
    {
       return redirect()->route('subscribers.index');
     }

    public function render()
    {
        return view('livewire.subscribers.create-subscribers');
    }
}
