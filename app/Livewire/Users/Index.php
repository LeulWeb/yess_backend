<?php

namespace App\Livewire\Users;

use App\Models\User;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

#[Title("YESS Users")]
class Index extends Component
{

    public string $search = '';
    use WithPagination;


    public $perPage;

   //search method


   public $roleFilter = "";


    public function delete(User $user){
        $user->delete();
        session()->flash('success','user ' .$user->name. ' successfully',) ;
        return redirect()->route('users.index');
    }
    public function cancel()
    {
       return redirect()->route('users.index');
     }

    public function render()

    {
        if($this->roleFilter != ""){
            $users= User::role($this->roleFilter)->paginate($this->perPage);
        }
        return view('livewire.users.index',[
            'userList'=>user::search($this->search)->latest()->paginate(5),
        ]);
    }
}
