<?php

namespace App\Livewire\Profile;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Livewire\Attributes\Validate;
use App\Models\User;

class UpdatePassword extends Component
{
    public $currentPassword;
    public $newPassword;
    public $confirmPassword;

    protected $rules = [
        'currentPassword' => 'required',
        'newPassword' => 'required|min:3|confirmed',
        'confirmPassword' => 'required',
    ];

    public function updatePassword()
    {
        $this->resetErrorBag(); // Clear any previous errors

        $validatedData = $this->validate(); // Validate the inputs

        // Check if the current password is correct
        if (!Hash::check($this->currentPassword, Auth::user()->password)) {
            $this->addError('currentPassword', 'Current password does not match the one on record.');
            return;
        }

        // Update the password
        Auth::user()->update([
            'password' => Hash::make($this->newPassword),
        ]);

        session()->flash('message', 'Password successfully updated.');
    }




public function render()
{
    return view('livewire.profile.update-password');
}

}
