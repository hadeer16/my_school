<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable=['quizz_id','question','a','b','c','d','correct','mark'];


    public function quizzs(){
        return $this->belongsTo(Quizz::class, 'quizz_id');
    }
    public function quiz_students(){
        return $this->hasMany(Quiz_Student::class , 'question_id');
    }
}
