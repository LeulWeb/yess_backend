<?php

namespace App\Livewire\Youth;

use App\Models\User;
use App\Models\Youth;
use Livewire\Component;
use Livewire\Attributes\Validate;

class Show extends Component
{
    #[Validate('nullable|url')]
    public $video_link;


    #[Validate('required|integer')]
    public $user_id;

    #[Validate('required|min:200|max:1000')]
    public $achievment;



    public Youth $youth;


    public bool $editMode = false;

    public function toggleEdit()
    {
        $this->editMode = !$this->editMode;
    }

    public function mount(Youth $youth)
    {
        $this->video_link = $youth->video_link;
        $this->user_id = $youth->user_id;
        $this->achievment = $youth->achievment;
    }

    public function delete()
    {
        $this->youth->delete();
        session()->flash('success', 'Youth ' . ' deleted successfully');
        return redirect()->route('youth.index');
    }

    public function update()
    {
        $this->validate();

        $this->youth->update([
            'user_id'=>$this->user_id,
            'video_link'=>$this->video_link,
            'achievment'=>$this->achievment,
        ]);


        session()->flash('success', $this->youth->user->name.' promotion updated successfully');
        return redirect()->route('youth.index');
    }
    public function cancel()
    {
        return redirect()->route('youth.index');
    }
    public function render()
    {
        return view('livewire.youth.show', [
            'youth' => $this->youth,
            'userList' => User::latest()->get(),
        ]);
    }
}
