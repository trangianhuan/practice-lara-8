<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Option;

class OptionQuestion extends Component
{
    public $options = [];

    public function render()
    {
        $this->options = Option::isQuestion()->get()->toArray();

        return view('livewire.option-question');
    }
}
