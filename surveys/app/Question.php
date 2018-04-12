<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = [
        'question', 'survey_id', 'type_id'
    ];

    public function survey()
    {
        return $this->belongsTo(Survey::class);
    }

    public function type()
    {
        return $this->belongsTo(Type::class);
    }
    
    public function answers()
    {
        return $this->hasMany(Answer::class);
    }
}
