<?php

namespace App\Livewire;

use App\Models\Startup;
use App\Models\subscriber;
use App\Models\Trainer;
use App\Models\User;
use App\Models\Volunteer;
use Livewire\Component;

class Dashboard extends Component
{
    public $users;
    public $userCount;
    public $subscriberCount;
    public $trainerCount;
    public $volunteerCount;
    public $startupCount;
    public function mount()
{
    $this->userCount = User::count();
    $this->subscriberCount = subscriber::count();
    $this->trainerCount = Trainer::count();
    $this->volunteerCount = Volunteer::count();
    $this->startupCount = Startup::count();
    $this->users = User::all();
}
    public function render()
    {
        return view('livewire.dashboard');
    }
}
