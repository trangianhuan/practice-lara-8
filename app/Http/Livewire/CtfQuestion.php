<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Question;
use Michelf\Markdown;

class CtfQuestion extends Component
{
    public $types = [
        ['question_type' => 0, 'option' => ['value' => 'All']]
    ];

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

    public function mount()
    {
        $this->questions = Question::with('option')->get();
        foreach ($this->questions as $qs) {
            $qs['question'] = Markdown::defaultTransform(nl2br($qs['question']));
        }

        $this->questionsAll = $this->questions->groupBy('question_type')->toArray();

        $arrTypes = $this->questions->unique('question_type')->values()->toArray();
        foreach ($arrTypes as $type) {
            $this->types[] = $type;
        }

        $this->questions = $this->questions->toArray();
    }

    public function render()
    {
        return view('livewire.ctf-question');
    }

    public function fnChange($type)
    {
        $this->questions = $this->questionsAll[$type] ?? [];
    }

    public function submitQuest($answer, $questionId)
    {
        $question = Question::find($questionId);
        if ($question) {
            $messageID = 'answer-mess-' . $questionId;
            $message = 'Success';
            // $message = 'Error';

            $this->dispatchBrowserEvent('submitQuest', [
                'code' => true,
                'messageID' => $messageID,
            ]);
        }

    }
}
