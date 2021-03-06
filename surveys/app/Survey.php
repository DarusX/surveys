<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Survey extends Model
{
    protected $fillable = [
        'survey', 'min_age', 'max_age'
    ];

    public function questions()
    {
        return $this->hasMany(Question::class);
    }
}
