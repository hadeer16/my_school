<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Quizz extends Model
{
    protected $fillable=['teacher_id','subject_id','title','classroom_id'];


    public function teachers(){
        return $this->belongsTo(Teacher::class, 'teacher_id');
    }
    public function questions(){
        return $this->belongsTo(Question::class, 'quizz_id');        
    }
    public function subjects(){
        return $this->belongsTo(Subject::class, 'subject_id');
        
    }
    public function classes(){
        return $this->belongsTo(Classroom::class, 'classroom_id');
    }
}
