<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Question;
use Exception;
use Log;

class FormQuestion extends Component
{
    public $questionId;
    public $title;
    public $question;
    public $answer;
    public $question_type;

    protected $rules = [
        'title' => 'required|min:6',
        'question' => 'required',
        'answer' => 'required',
        'question_type' => 'required',
    ];

    public function submit()
    {
        $data = $this->validate();

        if (!empty($this->questionId)) {
            $question = Question::where('id', $this->questionId)
                ->update($data);
        } else {
            Question::create($data);
        }

        return redirect()->to('/questions');
    }

    public function abc($data)
    {
        $params = [];
        parse_str($data, $params);

        $this->title = $params['title'] ?? $this->title;
        $this->question = $params['question'] ?? $this->question;
        $this->answer = $params['answer'] ?? $this->answer;
        $this->question_type = $params['question_type'] ?? $this->question_type;
        $this->submit();
    }

    public function mount()
    {

        if (!empty($this->questionId)) {
            try {
                $question = Question::find($this->questionId);
                if ($question) {
                    $this->title = $question->title;
                    $this->question = $question->question;
                    $this->answer = $question->answer;
                    $this->question_type = $question->question_type;
                }else{
                    abort(404);
                }
            } catch (Exception $e) {
                Log::error($e);
            }
        }
    }

    public function render()
    {
        return view('livewire.form-question');
    }
}
