<?php

namespace App\Livewire\Partners;

use App\Models\Partner;
use Livewire\Component;
use Livewire\Attributes\Title;
#[Title('Partners')]

class Index extends Component
{
    public string $search = '';


    public function delete(Partner $partner){
        $partner->delete();
        session()->flash('success','Startup ' .$partner->id. ' successfully',) ;
        return redirect()->route('partners.index');
    }
    public function cancel()
    {
       return redirect()->route('partners.index');
     }

    public function render()
    {
        return view('livewire.partners.index',[
            'partnerList'=>Partner::search($this->search)->latest()->paginate(5),
        ]);
    }


}
