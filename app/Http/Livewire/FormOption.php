<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Option;
use Exception;
use Log;

class FormOption extends Component
{
    public $value;
    public $optionId;

    protected $rules = [
        'value' => 'required|min:6',
    ];

    public function submit()
    {
        $data = $this->validate();

        if (!empty($this->optionId)) {
            $option = Option::where('id', $this->optionId)
                ->update($data);
        } else {
            Option::create($data);
        }

        return redirect()->to('/options/question');
    }

    public function mount()
    {
        if (!empty($this->optionId)) {
            try {
                $option = Option::find($this->optionId);
                if ($option) {
                    $this->value = $option->value;
                } else {
                    abort(404);
                }
            } catch (Exception $e) {
                Log::error($e);
            }
        }
    }

    public function render()
    {
        return view('livewire.form-option');
    }
}
