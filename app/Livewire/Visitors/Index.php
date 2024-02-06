<?php

namespace App\Livewire\Visitors;

use App\Models\User;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;
use PhpParser\Node\Expr\Cast\String_;

use function Laravel\Prompts\search;


#[Title("Users List")]

class Index extends Component
{

    use WithPagination;

    public string $search = '';

    public string $role = '';

    public string $status = '';

    // reseting page after a search 
    public function updatedSearch()
    {
        $this->resetPage();
    }


    // function to delete user 
    public function delete(User $user)
    {

        if ($user) {
            $user->delete();
            session()->flash('success', ' user deleted successfully');
            return redirect()->route('users.index');
        } else {
            return redirect()->route('users.index');
        }
    }


    public function render()
    {

        return view('livewire.visitors.index', [
            'userList' => User::latest()
                ->where('role', '!=', 'admin') // Exclude admins
                ->status($this->status)
                ->search($this->search)
                ->role($this->role)
                ->paginate(10),
        ]);
    }
}
