<?php

namespace App\Livewire\Faq;

use App\Models\Faq;
use Livewire\Component;
use Livewire\Attributes\Validate;
use Livewire\Attributes\Title;
#[Title('Faqs')]

class Create extends Component
{
    #[Validate('required|max:65535')]
    public $question;
    #[Validate('required|max:65535')]
    public $answer;
    public function create()
    {
        $validated = $this->validate();

        Faq::create($validated);
        session()->flash('success', 'faq created successfully');
        return redirect()->route('faqs.index');
    }
    public function cancel()
        {
        return redirect()->route('faqs.index');
        }

    public function render()
    {
        return view('livewire.faqs.create');
    }
}
