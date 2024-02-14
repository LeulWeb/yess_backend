<?php

namespace App\Livewire\DonationRequest;

use App\Models\DonationRequest;
use Livewire\Component;
use Livewire\Attributes\Title;
#[Title('Donation Request')]

class Show extends Component
{


        public $phone;
        public $reason;
        public $document;

        public DonationRequest $donationRequest;

        public function delete()
        {
            $this->donation->delete();
            session()->flash('success', 'donationRequest deleted successfully');
            return redirect()->route('donation-request.index');
        }
        // public function cancel()
        // {
        //    return redirect()->route('donations.index');
        //  }

        public function render()
        {
            return view('livewire.donation-request.show');
        }
    }
 
