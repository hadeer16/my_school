<?php

namespace App\model;

use Attribute;
use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    protected $fillable = ['name','note','img'];

    public function classrooms()
    {
        return $this->hasMany(Classroom::class,'level_id');
    }
    public function level_teacher(){
        return $this->hasMany(Teacher::class,'level_id');
    }
    public function subjects(){
        return $this->hasMany(Subject::class,'level_id');
    }
    public function students(){
        return $this->hasMany(Student::class,'level_id');
    }
    public function fees(){
        return $this->hasMany(Fees::class,'level_id');
    }
    public function invoices(){
        return $this->hasMany(Invoice::class, 'level_id');
    }
    public function student_acc(){
        return $this->hasMany(Student_Account::class, 'level_id');
    }
    public function attend(){
        return $this->hasMany(Attendance::class,'level_id');
    }
}
