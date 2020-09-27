<?php

namespace App\Http\Livewire;

use Livewire\Component;

class CtfQuestion extends Component
{
    public $types =[
        ['type' => 'type1', 'name'=> 'cau hoi image',],
        ['type' => 'type2', 'name'=> 'cau hoi IQ',],
    ];

    public $questions = [];

    public $questionsAll = [
        'type1' => [
            ['id' => 1, 'question' => 'cau hoi 1', 'type'=>'type1'],
            ['id' => 3, 'question' => 'cau hoi 3', 'type'=>'type1'],
        ],
        'type2' => [
            ['id' => 2, 'question' => 'cau hoi 2', 'type'=>'type2'],
            ['id' => 4, 'question' => 'cau hoi 4', 'type'=>'type2'],
        ]
    ];

    public function render()
    {
        return view('livewire.ctf-question');
    }

    public function fnChange($type)
    {
         $this->questions = $this->questionsAll[$type];
    }
}
