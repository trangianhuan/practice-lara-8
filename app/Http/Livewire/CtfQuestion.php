<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Question;

class CtfQuestion extends Component
{
    public $types = [];
    // [
    //     ['type' => 'type1', 'name'=> 'cau hoi image',],
    //     ['type' => 'type2', 'name'=> 'cau hoi IQ',],
    // ];

    public $questions = [];

    public $questionsAll =[];
    // [
    //     'type1' => [
    //         ['id' => 1, 'question' => 'cau hoi 1', 'type'=>'type1'],
    //         ['id' => 3, 'question' => 'cau hoi 3', 'type'=>'type1'],
    //     ],
    //     'type2' => [
    //         ['id' => 2, 'question' => 'cau hoi 2', 'type'=>'type2'],
    //         ['id' => 4, 'question' => 'cau hoi 4', 'type'=>'type2'],
    //     ]
    // ];

    public function render()
    {
        $this->questions = Question::with('option')
            //->where('id',222)
            ->get();
        $this->questionsAll = $this->questions->groupBy('question_type')->toArray();
        $this->types = $this->questions->unique('question_type')->values()->toArray();
        // dd($questions, $questionsAll, $rs);
       // dd($this->types);
        $this->questions = $this->questions->toArray();
        return view('livewire.ctf-question');
    }

    public function fnChange($type)
    {
        $this->questions = $this->questionsAll[$type] ?? [];
    }
}
