<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use DB;

class Ranking extends Component
{
    public $ranks = [];

    public function mount()
    {
        $this->ranks = DB::table('team_user')
            ->selectRaw('team_id, (select name from teams where team_id = id) as name, (select sum(point) from answers where answers.team_id = team_user.team_id) as point')
            ->groupBy('team_id')
            ->havingRaw('count(team_id) > 0')
            ->orderBy('point', 'desc')
            ->get()->toArray();
    }

    public function render()
    {
        return view('livewire.ranking');
    }
}
