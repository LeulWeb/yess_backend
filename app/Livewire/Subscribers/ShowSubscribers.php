<?php

namespace App\Livewire\Subscribers;

use App\Models\subscriber;
use Livewire\Component;
use Livewire\Attributes\Validate;

class ShowSubscribers extends Component
{
    #[Validate('required|max:50')]
    public $name;
    // !
    // skip the update email error
    // #[Validate('required|email|unique:startups,contact_email')]
    #[Validate('required|email')]
    public $email;

    public subscriber $subscriber;

    public bool $editMode = false;


    public function toggleEdit(){
        $this->editMode = !$this->editMode;
    }


    public function mount(subscriber $subscriber)
    {
        $this->subscriber = $subscriber;
        $this->name = $subscriber->name;
        $this->email = $subscriber->email;

    }

    public function delete()
    {
        $this->subscriber->delete();
        session()->flash('success', 'subscribers '. $this->subscriber->name  .' deleted successfully');
        return redirect()->route('subscribers.index');
    }



    public function update(){
        $this->validate([
            // Add validation rules for your fields here

            'name' => 'required|string',
            'email' => 'required|string',

            // Add more validation rules as needed
        ]);

        $this->subscriber->update([

            'name' => $this->name,
            'email' => $this->email,

            // Update other fields accordingly
        ]);


        session()->flash('success', 'subscriber updated successfully');
        return redirect()->route('subscribers.index');
    }

    public function render()
    {
        return view('livewire.subscribers.show-subscribers');
    }
}
