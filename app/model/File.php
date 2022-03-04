<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    protected $fillable =['files','classroom_id','teacher_id','subject_id'];

    public function classes(){
        return $this->belongsTo(Classroom::class, 'classroom_id');
    }
    public function teachers(){
        return $this->belongsTo(Teacher::class ,'teacher_id');
    }
    public function subjects(){
        return $this->belongsTo(Subject::class ,'subject_id');
    }

}
