<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Question as ModelQuestion;

class Questions extends Component
{
    public $questions = [];

    public function render()
    {
        $this->questions = ModelQuestion::get()->toArray();

        return view('livewire.questions');
    }
}
