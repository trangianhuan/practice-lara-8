<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Question;
use App\Models\Answer;
use Michelf\Markdown;
use Auth;

class CtfQuestion extends Component
{
    const MINUS_POINT_PERCENT = 10;
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
        $currentTeam = Auth::user()->currentTeam->id ?? 0;
        $this->questions = Question::with(['option', 'answers' => function($q) use ($currentTeam){
            $q->where('team_id', $currentTeam);
        }])->get();
        foreach ($this->questions as $qs) {
            $qs['question'] = Markdown::defaultTransform(nl2br($qs['question']));
            $qs['showQuestion'] = !count($qs['answers']);
        }

        $this->questionsAll[0] = $this->questions->toArray();
        $this->questionsAll = $this->questionsAll + $this->questions->groupBy('question_type')->toArray();

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
        if (Auth::check()) {
            $user = Auth::user();
            $messageID = 'answer-mess-' . $questionId;
            $code = false;
            $question = Question::find($questionId);
            $message = 'Your answer is not correct. Give it one more try!';
            if ($question) {
                if ($question->answer === $answer){
                    $code = true;
                    $message = 'Your answer is correct.';
                    $userCurrentTeamId = $user->currentTeam->id ?? 0;
                    $numberOfAnswerOfTeam = Answer::where('question_id', $questionId)
                        ->where('team_id', $userCurrentTeamId)->count();
                    if (!$numberOfAnswerOfTeam) {
                        $numberOfTeamAnswered = Answer::whereQuestionId($questionId)->count();
                        Answer::updateOrCreate([
                            'question_id' => $questionId,
                            'user_id' => $user->id,
                            'team_id' => $userCurrentTeamId,
                        ], [
                            'point' => $this->calcPoint($numberOfTeamAnswered, $question->point),
                        ]);
                    }
                    foreach ($this->questions as $qs) {
                        if ($questionId == $qs['id']) {
                            $qs['showQuestion'] = false;
                        }
                    }
                }

                $this->dispatchBrowserEvent('submitQuest', [
                    'code' => $code,
                    'messageID' => $messageID,
                    'message' => $message,
                ]);
            }
        }

    }

    private function calcPoint($numberOfTeamAnswered, $pointQuestion)
    {
        $minusPoint = $pointQuestion * self::MINUS_POINT_PERCENT / 100;

        return $pointQuestion - $numberOfTeamAnswered * $minusPoint;
    }
}
