<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable=['name','gender','email','age','password','religion','img','birth','level_id','classroom_id','myparent_id','user_id']; 
    


    public function levels(){
        return $this->belongsTo(Level::class,'level_id');
    }
    public function classes(){
        return $this->belongsTo(Classroom::class,'classroom_id');
    }
    public function mypare(){
        return $this->belongsTo(Myparent::class,'myparent_id');
    }
    public function users(){
        return $this->belongsTo(User::class ,'user_id');
    }
    public function attend(){
        return $this->hasMany(Attendance::class, 'student_id');
    }
    public function boxs(){
        return $this->hasMany(Box::class, 'student_id');
    }
    public function quiz_students(){
        return $this->hasMany(Quiz_Student::class , 'student_id');
    }
    public function invoices(){
        return $this->hasOne(Invoice::class, 'student_id');
    }
    public function student_acc(){
        return $this->hasMany(Student_Account::class, 'student_id');
    }
    public function receipts(){
        return $this->belongsTo(Receipt::class , 'student_id');
    }
}
