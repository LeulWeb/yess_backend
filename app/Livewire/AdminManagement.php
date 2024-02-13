<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class AdminManagement extends Component
{
    public $admins;
    public $superAdmins;

    public function mount()
    {
        $this->loadAdmins();
    }

    public function loadAdmins()
    {
        $this->admins = User::where('role', 'admin')->get();
        $this->superAdmins = User::where('role', 'super_admin')->get();
    }

    public function deleteAdmin($id)
    {
        $admin = User::findOrFail($id);
        $admin->delete();

        session()->flash('message', 'Admin deleted successfully.');

        $this->loadAdmins();
    }


    public function render()
    {
        return view('livewire.admin-management');
    }
}
