<?php

namespace App\Livewire\Faq;

use App\Models\Faq;
use Livewire\Component;
use Livewire\Attributes\Validate;

class Show extends Component
{
    #[Validate('required|max:50')]
    public $question;
    #[Validate('required|max:65535')]
    public $answer;
    public Faq $faq;


    public bool $editMode = false;

    public function toggleEdit(){
        $this->editMode = !$this->editMode;
    }

    public function mount(Faq $faq)
    {   $this->faq = $faq;
        $this->question = $faq->question;
        $this->answer = $faq->answer;

    }

     public function delete()
    {
        $this->faq->delete();
        session()->flash('success', 'faq ' .' deleted successfully');
        return redirect()->route('faqs.index');
    }

    public function update(){
        $this->validate([
            // Add validation rules for your fields here

            'question' => 'required|string',
            'answer' => 'required|string',

            // Add more validation rules as needed
        ]);

        $this->faq->update([

            'question' => $this->question,
            'answer' => $this->answer,

            // Update other fields accordingly
        ]);


        session()->flash('success', 'faq updated successfully');
        return redirect()->route('faqs.index');
    }
    public function render()
    {
        return view('livewire.faqs.show');
    }
}
