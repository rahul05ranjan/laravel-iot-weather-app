<?php

namespace App\Http\Livewire;

use Livewire\Component;

class DashBox extends Component
{
    public $title = 'Dash Box';
    public $temperature = 0;
    public $time = 0;
    public function render()
    {
        return view('livewire.dash-box', [
            'title' => $this->title,
            'temperature' => $this->temperature,
            'time' => $this->time,
        ]);
    }
}