<?php

namespace App\Livewire\Users;

use App\Enums\Status;
use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\Validate;
use Livewire\WithFileUploads;

class CreateUsers extends Component
{
            use WithFileUploads;


        public String $imageName = '';
        // public String $profile_pictureName;
        public string $profile_pictureName = '';

        #[Validate('required|max:50')]
        public $name;
        #[Validate('required|max:50')]
        public $username;
        #[Validate('required|min:10|max:65535')]
        public $story;
        #[Validate('required|min:10|max:65535')]
        public $bio;

        #[Validate('nullable|image|mimes:jpeg,png,jpg,gif|max:7168')]
        public $profile_picture;

        // #[Validate('nullable|image|mimes:jpeg,png,jpg,gif|max:7168')]

        // public $image;

        #[Validate('required')]
        public $role;


        #[Validate('required|max:50')]
        public $interest;

        #[Validate('required|email|unique:users,email')]
        public $email;
        #[Validate('required|email|unique:users,email')]
        public $email_verified_at;


        #[Validate('required|regex:/^\+(?:[0-9] ?){6,14}[0-9]$/')]
        public $phone;


        #[Validate('nullable|max:200')]
        public $locations;
        #[Validate('nullable|max:200')]
        public $skill;



        public function create()
        {
            $validated = $this->validate();


            // if(!empty($this->image)){
            //     $this->imageName = time().'.'.$this->image->extension();
            //     $this->image->storeAs('user', $this->imageName, 'public');
            // }

            if(!empty($this->profile_picture)){
                $this->profile_pictureName = time().'.'.$this->profile_picture->extension();
                $this->profile_picture->storeAs('user', $this->profile_pictureName, 'public');
            }

            $validated['profile_picture']= 'user/'.$this->profile_pictureName;
            // $validated['image']= 'user/'.$this->imageName;

            User::create($validated);
            session()->flash('success', 'user created successfully');
            return redirect()->route('users.users');


        }
        public function cancel()
{
     return redirect()->route('users.users');
}


        public function render()
        {
            return view('livewire.users.create-users', [
                'Status' => Status::getValues(),

            ]);
        }

}
