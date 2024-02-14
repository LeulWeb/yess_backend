<?php

namespace App\Livewire\Scholarships;

use App\Enums\CurrencyEnum;
use App\Models\Scholarship;
use Livewire\Component;
use Livewire\Attributes\Validate;
use Livewire\WithFileUploads;
use Livewire\Attributes\Title;
#[Title('Scholarships ')]

class Create extends Component

{


    use WithFileUploads;


    public string $imageName = '';

    #[Validate('required|min:50|max:65535')]
    public $description;

    #[Validate('nullable|image|mimes:jpeg,png,jpg,gif|max:7168')]
    public $cover;

    #[Validate('required')]
    public $currency;


    #[Validate('required|max:50')]
    public $country;


    #[Validate('numeric|between:1,1000000')]
    public $funding_amount;
    #[Validate('numeric|between:1,1000')]
    public $program_duration;
    #[Validate('nullable')]
    public $application_process;
    #[Validate('nullable')]
    public $eligibility_criteria;

    #[Validate('required|max:100')]
    public $title;
    #[Validate('required|string')]
    public $program;
    #[Validate('nullable')]
    public $institution;
    #[Validate('nullable')]
    public $funding_source;
    #[Validate('nullable|url')]
    public $link;



    public function create()
    {
        $validated = $this->validate();


        if (!empty($this->cover)) {
            $this->imageName = time() . '.' . $this->cover->extension();
            $this->cover->storeAs('scholarship_covers', $this->imageName, 'public');
        }


        $validated['cover'] = 'scholarship_covers/' . $this->imageName;

        Scholarship::create($validated);
        session()->flash('success', 'scholarship created successfully');
        return redirect()->route('scholarships.index');
    }
    public function cancel()
    {
        return redirect()->route('scholarships.index');
    }


    public function render()
    {
        return view('livewire.scholarships.create', [
            'CurrencyEnum' => CurrencyEnum::getValues(),

        ]);
    }
}
