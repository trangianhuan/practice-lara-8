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

    protected $casts = [
        'created_at' => 'datetime:Y-m-d H:i:s',
    ];

    public function option()
    {
        return $this->belongsTo(Option::class, 'question_type')->withDefault();
    }
}