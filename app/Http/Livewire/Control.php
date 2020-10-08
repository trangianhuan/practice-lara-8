<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Option;

class Control extends Component
{
    public $isChecked;

    protected $listeners = ['toogleQuestion'];

    public function render()
    {
        return view('livewire.control');
    }

    public function mount()
    {
        $this->isChecked = Option::isControlQuestion()->first()->value ?? 0;
        $this->isChecked = empty($this->isChecked) ? '' : 'checked';
    }

    public function toogleQuestion($checked)
    {
        Option::updateOrCreate([
            'id' => Option::ID_CONTROL_Q,
        ], [
            'value' => $checked,
        ]);

        $this->dispatchBrowserEvent('toogleQuestionResult', [
            'code' => true,
        ]);
    }
}
