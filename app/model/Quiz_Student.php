<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Quiz_Student extends Model
{
    protected $fillable = ['student_id','question_id','answer','mark'];
    public function students(){
        return $this->belongsTo(Student::class , 'student_id');
    }
    public function questions(){
        return $this->hasMany(Question::class , 'question_id');
    }
}
