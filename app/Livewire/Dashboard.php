<?php

namespace App\Livewire;

use App\Models\Startup;
use App\Models\subscriber;
use App\Models\Trainer;
use App\Models\User;
use Illuminate\Pagination\Paginator;
use App\Models\Volunteer;
use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\WithPagination;

#[Title('Dashboard  ')]

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
        {
            $userss = User::latest()->paginate(5);
            return view('livewire.dashboard', compact('userss'));
        }
    }
}
