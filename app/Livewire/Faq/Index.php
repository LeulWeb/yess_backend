<?php

namespace App\Livewire\Faq;

use App\Models\Faq;
use Livewire\Component;

class Index extends Component
{

     public string $search = '';


    public function delete(Faq $faq){
        $faq->delete();
        session()->flash('success','faq ' .'deleted '. ' successfully',) ;
        return redirect()->route('faqs.index');
    }
    public function cancel()
    {
    return redirect()->route('faqs.index');
    }

    public function render()
    {
        return view('livewire.faqs.index',[
             'faqList'=>Faq::search($this->search)->latest()->paginate(5),

        ]);
    }
}
