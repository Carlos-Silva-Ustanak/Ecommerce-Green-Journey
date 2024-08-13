<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ThemeToggle extends Component
{
    public $darkMode;

    public function mount()
    {
        $this->darkMode = session()->get('darkMode', false);
    }

    public function toggleTheme()
    {
        $this->darkMode = !$this->darkMode;
        session()->put('darkMode', $this->darkMode);
        $this->emit('themeChanged', $this->darkMode);
    }

    public function render()
    {
        return view('livewire.theme-toggle');
    }
}

