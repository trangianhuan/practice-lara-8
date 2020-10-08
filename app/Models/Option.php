<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    const T_QUESTION = 'question';
    const T_CONTROL_Q = 'control_question';
    const ID_CONTROL_Q = 1;
    const ID_QUESTION_IQ = 2;
    const ARRAY_ID_KEEP = [self::ID_CONTROL_Q, self::ID_QUESTION_IQ];

    protected $fillable = [
        'value',
    ];

    protected $casts = [
        'created_at' => 'datetime:Y-m-d H:i:s',
    ];

    public function scopeIsQuestion($query)
    {
        return $query->where('type', self::T_QUESTION);
    }

    public function scopeIsControlQuestion($query)
    {
        return $query->where('type', self::T_CONTROL_Q);
    }
}
