<?php

namespace App\Livewire\Scholarships;

use App\Enums\CurrencyEnum;
use App\Models\Scholarship;
use Livewire\Component;
use Livewire\Attributes\Validate;
use Livewire\WithFileUploads;

class Show extends Component

{


    use WithFileUploads;


    public String $imageName = '';

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
    #[Validate('nullable')]
    public $funding_source;

    #[Validate('required|max:100')]
    public $title;
    #[Validate('required|date')]
    public $deadline;

    #[Validate('nullable|max:1024')]
    public $program;
    #[Validate('nullable|max:1024')]
    public $institution;

    #[Validate('nullable|url')]
    public $link;


    public Scholarship $scholarship;


    public bool $editMode = false;


    public function toggleEdit(){
        $this->editMode = !$this->editMode;
    }


    public function mount(scholarship $scholarship)
    {
        $this->description = $scholarship->description;

        $this->currency = $scholarship->currency;
        $this->country = $scholarship->country;
        $this->funding_amount = $scholarship->funding_amount;
        $this->title = $scholarship->title;
        $this->institution = $scholarship->institution;
        $this->program = $scholarship->program;
        $this->application_process = $scholarship->application_process;
        $this->link = $scholarship->link;
        $this->deadline = $scholarship->deadline;
        $this->program_duration = $scholarship->program_duration;
        $this->funding_source = $scholarship->funding_source;
        $this->eligibility_criteria = $scholarship->eligibility_criteria;


        // Initialize $imageName and $logoName properties
        $this->imageName = '';


        $this->imageName = $this->imageName ?: $scholarship->cover;

    }


    public function delete()
    {
        $this->scholarship->delete();
        session()->flash('success', 'scholarship '. $this->scholarship->name  .' deleted successfully');
        return redirect()->route('scholarships.index');
    }



    public function update()
    {
        $this->validate([
            // Add validation rules for your fields here

            'description' => 'required|string',
            'currency' => 'required|string',
            'country' => 'required|string',
            'funding_amount' => 'required|integer',
            'title' => 'required|string|max:255',
            'application_process' => 'required|string',
            'funding_source' => 'nullable',
            'eligibility_criteria' => 'nullable',
            'deadline' => 'nullable|date',
            'institution' => 'nullable|',
            'program' => 'nullable',
            'program_duration' => 'required|integer',

            'link' => 'nullable|url',

            // Add more validation rules as needed
        ]);

        $this->scholarship->update([

            'description' => $this->description,
            'currency' => $this->currency,
            'country' => $this->country,
            'funding_amount' => $this->funding_amount,
            'title' => $this->title,
            'institution' => $this->institution,
            'program' => $this->program,
            'application_process' => $this->application_process,
            'link' => $this->link,
            'deadline' => $this->deadline,
            'program_duration' => $this->program_duration,
            'funding_source' => $this->funding_source,
            'eligibility_criteria' => $this->eligibility_criteria,
            // Update other fields accordingly
        ]);

        if ($this->cover) {
            // Handle image upload and update
            $this->scholarship->update(['cover' => $this->cover->store('scholarship_covers', 'public')]);
        }


        session()->flash('success', 'scholarship updated successfully');
        return redirect()->route('scholarships.index');
    }
    public function cancel()
    {
       return redirect()->route('scholarships.index');
     }

    public function render()
    {
        return view('livewire.scholarships.show', [
            'CurrencyEnums'=>CurrencyEnum::getValues()
        ]);
    }
}
