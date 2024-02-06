<?php

namespace App\Livewire\Users;

use App\Enums\Status;
use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\Validate;
use Livewire\WithFileUploads;

class Show extends Component
{
    use WithFileUploads;

    public String $imageName;

    #[Validate('required|max:50')]
    public $name;
    #[Validate('required|max:50')]
    public $username;
    #[Validate('required|min:50|max:65535')]
    public $bio;
    #[Validate('required|min:50|max:65535')]
    public $story;

    #[Validate('nullable|image|mimes:jpeg,png,jpg,gif|max:7168')]

    public $profile_picture;
    #[Validate('required')]
    public $status;
    #[Validate('required')]
    public $location;
    #[Validate('nulable')]
    public $skill;


    #[Validate('required|max:50')]
    public $role;




    // !
    // skip the update email error
    // #[Validate('required|email|unique:users,email')]
    #[Validate('required|email')]
    public $email;

    #[Validate('required|regex:/^\+(?:[0-9] ?){6,14}[0-9]$/')]
    public $phone;

    public User $user;

    public bool $editMode = false;


    public function toggleEdit(){
        $this->editMode = !$this->editMode;
    }


    public function mount(User $user)
    {
        $this->bio = $user->bio;
        $this->name = $user->name;
        $this->username = $user->username;
        $this->status = $user->status;
        $this->role = $user->role;
        $this->email = $user->email;
        $this->phone = $user->phone;
        $this->location= $user->location;
        $this->skill = $user->skill;


        // Initialize $imageName and $logoName properties
        $this->imageName = '';


        $this->imageName = $this->imageName ?: $user->profile_picture;

    }


    public function delete()
    {
        $this->user->delete();
        session()->flash('success', 'user '. $this->user->name  .' deleted successfully');
        return redirect()->route('users.index');
    }



    public function update()
    {
        $this->validate([
            // Add validation rules for your fields here
            'name' => 'required|string|max:255',
            'bio' => 'required|string',
            'story' => 'required|string',
            'username' => 'required|string',
            'status' => 'required|string',
            'role' => 'required|integer',

            'email' => 'required|email',
            'phone' => 'required|string',
            'skill'=>'nullable|string'

            // Add more validation rules as needed
        ]);

        $this->user->update([
            'name' => $this->name,
            'bio' => $this->bio,
            'username' => $this->username,
            'status' => $this->status,
            'role' => $this->role,
            'skill' => $this->skill,
            'email' => $this->email,
            'phone' => $this->phone,
            'location' => $this->location,

            // Update other fields accordingly
        ]);

        if ($this->profile_picture) {
            // Handle profile_picture upload and update
            $this->user->update(['profile_picture' => $this->profile_picture->store('path/to/image/folder', 'public')]);
        }



        session()->flash('success', 'user updated successfully');
        return redirect()->route('users.index');
    }
    public function cancel()
     {
        return redirect()->route('users.index');
      }

    public function render()
    {
        return view('livewire.users.show', [

        ]);
    }
}
