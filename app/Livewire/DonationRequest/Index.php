<?php

namespace App\Livewire\DonationRequest;

use App\Models\DonationRequest;
use Livewire\Component;
use Livewire\Attributes\Title;
#[Title('Donation Request')]

class Index extends Component

    {
        public string $search = '';


        public function delete(DonationRequest $donationRequest){
            $donationRequest->delete();
            session()->flash('success','donationRequest ' .$donationRequest->title. ' successfully',) ;
            return redirect()->route('donation-request.index');
        }
        // public function cancel()
        // {
        //    return redirect()->route('donationRequests.index');
        //  }
        public function render()
        {
            return view('livewire.donation-request.index',[
                'donationRequestList'=>donationRequest::search($this->search)->latest()->paginate(5),
            ]);
        }
    }
   
