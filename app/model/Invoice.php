<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $fillable=['level_id','student_id','classroom_id','fee_id','amount','text'];

    public function levels(){
        return $this->belongsTo(Level::class, 'level_id');
    }
    public function classes(){
        return $this->belongsTo(Classroom::class, 'classroom_id');
    }
    public function students(){
        return $this->belongsTo(Student::class, 'student_id');
    }
    public function fees(){
        return $this->belongsTo(Fees::class, 'fee_id');
    }
    public function accounts(){
        return $this->belongsTo(Student_Account::class, 'invoice_id');
    }
    public function receipts(){
        return $this->belongsTo(Receipt::class, 'receipt_id');
    }
}
