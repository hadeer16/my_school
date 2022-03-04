<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{
    protected $fillable = ['name','note','level_id'];

    public function levels()
    {
        return $this->belongsTo(Level::class,'level_id');
    }
    public function teachers(){
        return $this->belongsToMany(Teacher::class,'teacher_classes','classroom_id','teacher_id');
    }
    public function subjects(){
        return $this->hasMany(Subject::class,'classroom_id');
    }
    public function students(){
        return $this->hasMany(Student::class,'classroom_id');
    }
    public function classes(){
        return $this->hasMany(Fees::class,'classroom_id');
    }
    public function posts(){
        return $this->belongsTo(Post::class,'classroom_id');
    }
    public function attendance(){
        return $this->hasMany(Attendance::class, 'classroom_id');
    }
    public function files(){
        return $this->hasMany(File::class, 'classroom_id');
    }
    public function quizzs(){
        return $this->hasMany(Quizz::class, 'classroom_id');
    }
    public function invoices(){
        return $this->hasMany(Invoice::class, 'classroom_id');
    }
    public function student_acc(){
        return $this->hasMany(Student_Account::class, 'classroom_id');
    }
}
