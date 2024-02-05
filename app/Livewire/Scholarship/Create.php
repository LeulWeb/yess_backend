<?php

namespace App\Livewire\Scholarship;

use App\Enums\CurrencyEnum;
use App\Models\Scholarship;
use Livewire\Component;
use Livewire\Attributes\Validate;
use Livewire\WithFileUploads;

class Create extends Component
{ use WithFileUploads;
    public string $imageName = '';

    #[Validate('required|max:100')]
    public $title;
    #[Validate('required')]
    public $program;
    #[Validate('required')]
    public $institution;
    #[Validate('nullable|image|mimes:jpeg,png,jpg,gif|max:7168')]
    public $cover;
    #[Validate('required')]
    public $country;
    #[Validate('required')]
    public $program_duration;
    #[Validate('required|min:50|max:65535')]
    public $description;
    #[Validate('nullable|numeric')]
    public $currency;
    #[Validate('required')]
    public $eligibility_criteria;
    #[Validate('required|numeric')]
    public $funding_amount;

    #[Validate('required|date')]
    public $deadline;

    #[Validate('nullable')]
    public $application_process;

    #[Validate('nullable|url')]
    public $link;

    #[Validate('nullable')]
    public $funding_source;

    public function create()
    {
        $validated = $this->validate();
        if(!empty($this->cover)){
            $this->imageName = time().'.'.$this->cover->extension();
            $this->cover->storeAs('startup', $this->imageName, 'public');
        }

        Scholarship::create($validated);
        session()->flash('success', 'scholarship created successfully');
        return redirect()->route('scholarship-listing');
    }

    public function render()
    {
        return view('livewire.scholarship.create', [
            'CurrencyEnum' => CurrencyEnum::getValues(),
        ]);
    }
}
