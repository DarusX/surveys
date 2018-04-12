<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    protected $fillable = [
        'type'
    ];

    public function questions()
    {
        return $this->hasMany(Question::class);
    }
}
