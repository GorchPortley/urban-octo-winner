<?php

namespace App\Livewire;

use Livewire\Component;

class FileBrowser extends Component
{

    public string $name;
    public function render()
    {
        return view('livewire.file-browser');
    }
}
