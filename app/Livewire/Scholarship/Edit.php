<?php

namespace App\Livewire\Scholarship;

use App\Enums\CurrencyEnum;
use App\Models\Scholarship;
use Livewire\Component;
use Livewire\Attributes\Validate;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class Edit extends Component
{
use WithFileUploads, WithPagination;

public $scholarship;
public $title;
public $program;
public $institution;
public $cover;
public $country;
public $program_duration;
public $description;
public $currency;
public $eligibility_criteria;
public $funding_amount;
public $deadline;
public $application_process;
public $link;
public $funding_source;

public string $imageName = '';

protected $rules = [
    'title' => 'required|max:100',
    'program' => 'required',
    'institution' => 'required',
    'cover' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:7168',
    'country' => 'required',
    'program_duration' => 'required',
    'description' => 'required|min:50|max:65535',
    'currency' => 'nullable|numeric',
    'eligibility_criteria' => 'required',
    'funding_amount' => 'required|numeric',
    'deadline' => 'required|date',
    'application_process' => 'nullable',
    'link' => 'nullable|url',
    'funding_source' => 'nullable',
];

public function mount($scholarshipId)
{
    $this->scholarship = Scholarship::find($scholarshipId);

    // Set the initial values for the fields
    $this->title = $this->scholarship->title;
    $this->program = $this->scholarship->program;
    $this->institution = $this->scholarship->institution;
    // Set initial values for other fields here
}

public function update()
{
    $validatedData = $this->validate();

    if (!empty($this->cover)) {
        $imageName = time().'.'.$this->cover->extension();
        $this->cover->storeAs('startup', $imageName, 'public');
        $validatedData['cover'] = $imageName;
    }

    $this->scholarship->update($validatedData);

    session()->flash('success', 'Scholarship updated successfully');

    return redirect()->route('scholarship-listing');
}

public function render()
{
    return view('livewire.scholarship.edit', [
        'CurrencyEnum' => CurrencyEnum::getValues(),
        'scholarship' => $this->scholarship
    ]);
}
}
