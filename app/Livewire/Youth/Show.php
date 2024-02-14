<?php

namespace App\Livewire\Youth;

use App\Models\Youth;
use Livewire\Component;
use Livewire\Attributes\Validate;

class Show extends Component
{
    #[Validate('nullable|url')]
    public $video_link;
    #[Validate('boolean')]
    public $is_published;
    public Youth $youth;


    public bool $editMode = false;

    public function toggleEdit(){
        $this->editMode = !$this->editMode;
    }

    public function mount(Youth $youth)
    {   $this->youth = $youth;
        $this->video_link = $youth->video_link;
        $this->is_published = $youth->is_published;

    }

     public function delete()
    {
        $this->Youth->delete();
        session()->flash('success', 'Youth ' .' deleted successfully');
        return redirect()->route('youth.index');
    }

    public function update(){
        $this->validate([
            // Add validation rules for your fields here

            'video_link' => 'required|string',
            'is_published' => 'required|string',

            // Add more validation rules as needed
        ]);

        $this->youth->update([

            'video_link' => $this->video_link,
            'is_published' => $this->is_published,

            // Update other fields accordingly
        ]);


        session()->flash('success', 'Youth updated successfully');
        return redirect()->route('youth.index');
    }
    public function cancel()
    {
    return redirect()->route('youth.index');
    }
    public function render()
    {
        return view('livewire.youth.show');
    }
}
