<?php

namespace App\Livewire\Youth;

use App\Models\User;
use App\Models\Youth;
use Livewire\Component;
use Livewire\Attributes\Validate;


class Create extends Component
{
    #[Validate('nullable|url')]
    public $video_link;


    #[Validate('required|integer')]
    public $user_id;

    #[Validate('required|min:200|max:1000')]
    public $achievment;



    public function create()
    {

        $validated = $this->validate();


        $youth = Youth::create($validated);
        session()->flash('success', $youth->user->name . ' created successfully');
        return redirect()->route('youth.index');
    }
    public function cancel()
    {
        return redirect()->route('youth.index');
    }
    public function render()
    {
        return view('livewire.youth.create', [
            'userList' => User::all()
        ]);
    }
}
