<?php

namespace App\Livewire\Browse;

use App\Models\Driver;
use Livewire\Component;

class DriverBrowser extends Component
{
    public function render()
    {
        $drivers = Driver::where('status', 1)->get();
        return view('livewire.browse.driver-browser', compact('drivers'));
    }
}
