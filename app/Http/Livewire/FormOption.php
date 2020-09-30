<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Option;

class FormOption extends Component
{
    public $value;

    protected $rules = [
        'value' => 'required|min:6',
    ];

    public function submit()
    {
        $data = $this->validate();

        Option::create($data);

        return redirect()->to('/options/question');
    }

    public function render()
    {
        return view('livewire.form-option');
    }
}
