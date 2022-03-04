<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $fillable = ['name','level_id','classroom_id'];

    public function levels(){
        return $this->belongsTo(Level::class,'level_id');
    }
    public function classrooms(){
        return $this->belongsTo(Classroom::class,'classroom_id');
    }
    public function teachers(){
        return $this->belongsToMany(Teacher::class,'subject_teacher','subject_id','teacher_id');
    }
    public function files(){
        return $this->hasMany(File::class ,'subject_id');
    }
    public function quizzs(){
        return $this->hasMany(Quizz::class, 'subject_id');
    }
}
