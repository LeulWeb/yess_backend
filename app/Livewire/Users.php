<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\WithPagination;

#[Title("YESS Users")]
class Users extends Component
{

    use WithPagination;


    public $perPage;

   //search method
   public $search;

   public $roleFilter = "";



    public function render()
    {
         $users = User::where('email', 'like', '%'.$this->search.'%')->paginate($this->perPage);

        if($this->roleFilter != ""){
            $users= User::role($this->roleFilter)->paginate($this->perPage);
        }

        return view('livewire.users', [
            'users' => $users
        ]);
    }
}
