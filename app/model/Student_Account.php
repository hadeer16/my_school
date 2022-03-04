<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Student_Account extends Model
{
    protected $fillable=['level_id','classroom_id','student_id','receipt_id','debit','credit','invoice_id','text'];

    public function levels(){
        return $this->belongsTo(Level::class, 'level_id');
    }
    public function classes(){
        return $this->belongsTo(Classroom::class, 'classroom_id');
    }
    public function students(){
        return $this->belongsTo(Student::class, 'student_id');
    }
    public function invoices(){
        return $this->belongsTo(Invoice::class, 'invoice_id');
    }
    public function receipts(){
        return $this->belongsTo(Receipt::class, 'receipt_id');
    }
}
