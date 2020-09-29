<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = [
        'title',
        'question',
        'answer',
        'question_type',
    ];

    public function option()
    {
        return $this->belongsTo(Option::class, 'question_type')->withDefault();
    }
}
