<?php

namespace App\Livewire\MobileApp;

use Livewire\Component;
use App\Models\MobileAppVersion;

class Version extends Component
{


    public  $currentVersion = "";

    public function mount()
    {
        $version = MobileAppVersion::first();
        $this->currentVersion = $version->version;
    }

    public function update(){
        $version = MobileAppVersion::first();
        $version->version = $this->currentVersion;
        $version->save();
        session()->flash('success', 'You Mobile is on V'.$version->version);
        return redirect()->route('dashboard');
    }


    public function render()
    {
        return view('livewire.mobile-app.version', [
            'version' => MobileAppVersion::first()
        ]);
    }
}
