<?php

namespace App\Livewire\Youth;

use App\Models\User;
use App\Models\Youth;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\Attributes\Validate;


class Create extends Component
{

    public $video_link;



    public $user_id;

    public $achievment;



    public function create()
    {
        $validated = $this->validate(
            [
                'user_id' => ['required', 'integer', Rule::unique('youths')],
                'video_link' => ['nullable', 'url'],
                'achievment' => ['required', 'min:200', 'max:1000']
            ]

        );


        $youth = Youth::create($validated);
        session()->flash('success', $youth->user->name . ' promoted successfully');
        return redirect()->route('youth.index');
    }
    public function cancel()
    {
        return redirect()->route('youth.index');
    }
    public function render()
    {
        return view('livewire.youth.create', [
            'userList' => User::latest()->get()
        ]);
    }
}
