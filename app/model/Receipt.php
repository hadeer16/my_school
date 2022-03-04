<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Receipt extends Model
{
    protected $fillable=['student_id','debit','text'];
    
    public function students(){
        return $this->belongsTo(Student::class , 'student_id');
    }
    public function invoices(){
        return $this->hasMany(Invoice::class, 'receipt_id');
    }
    public function boxstudents(){
        return $this->belongsTo(BoxStudent::class,'receipt_id');
    }
    public function accounts(){
        return $this->hasMany(Student_Account::class, 'receipt_id');
    }
}
