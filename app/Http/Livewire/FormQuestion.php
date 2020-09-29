<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Question;

class FormQuestion extends Component
{
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

        Question::create($data);

        return redirect()->to('/question');
    }

    public function render()
    {
        return view('livewire.form-question');
    }
}
