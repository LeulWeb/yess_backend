<?php

namespace App\Livewire\Profile;

use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\Title;
#[Title('Create Admin')]

class CreateAdmin extends Component
{
    public $name;
    public $email;
    public $password;

    public function render()
    {
        return view('livewire.profile.create-admin');
    }

    public function createAdmin()
    {
        // Validate input fields
        $validatedData = $this->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:3',
        ]);

        // Create the admin user
        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => bcrypt($this->password),
            'role' => 'admin',
        ]);

        // Clear input fields after successful creation
        $this->name = '';
        $this->email = '';
        $this->password = '';

        // Display success message to the user
        session()->flash('success', 'Admin  created successfully.');
        return redirect()->route('dashboard');
    }
}
