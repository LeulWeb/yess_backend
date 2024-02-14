<?php

namespace App\Livewire\Youth;

use App\Models\Youth;
use Livewire\Component;
use Livewire\Attributes\Validate;


class Create extends Component
{
    #[Validate('nullable|url')]
    public $video_link;
    #[Validate('boolean')]
    public $is_published;
    public function create()
    {
        $validated = $this->validate();

        Youth::create($validated);
        session()->flash('success', 'youth created successfully');
        return redirect()->route('youth.index');
    }
    public function cancel()
        {
        return redirect()->route('youth.index');
        }
    public function render()
    {
        return view('livewire.youth.create');
    }
}
