<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    protected $fillable = ['level_id','classroom_id','student_id','teacher_id','status','date'];

    public function levels(){
        return $this->belongsTo(Level::class,'level_id');
    }
    public function classes(){
        return $this->belongsTo(Classroom::class,'classroom_id');
    }
    public function teachers(){
        return $this->belongsTo(Teacher::class,'teacher_id');
    }
    public function students(){
        return $this->belongsTo(Student::class,'student_id');
    }
}
