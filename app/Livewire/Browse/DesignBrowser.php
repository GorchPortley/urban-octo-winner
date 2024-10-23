<?php

namespace App\Livewire\Browse;

use Livewire\Component;
use App\Models\Design;

class DesignBrowser extends Component
{


    public function render()
    {
        $designs = Design::where('status', 1)->get();
        return view('livewire.browse.design-browser', compact('designs'));
    }
}
