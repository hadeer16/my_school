<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $fillable = ['name','email','password','gender','address','phone','image','level_id','salary','user_id'];

    public function teach_level(){
        return $this->belongsTo(Level::class,'level_id');
    }
    public function classrooms(){
        return $this->belongsToMany(Classroom::class,'teacher_classes','teacher_id','classroom_id');
    }
    public function subjects(){
        return $this->belongsToMany(Subject::class,'subject_teacher','teacher_id','subject_id');
    }
    public function users(){
        return $this->belongsTo(User::class ,'user_id');
    }
    public function attendance(){
        return $this->hasMany(Attendance::class,'teacher_id');
    }
    public function files(){
        return $this->hasMany(File::class ,'teacher_id');
    }
    public function quizzes(){
        return $this->hasMany(Quizz::class, 'teacher_id');
    }
}
