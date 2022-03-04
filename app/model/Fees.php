<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Fees extends Model
{
    protected $fillable = ['name','note','amount','level_id','classroom_id'];


    public function levels(){
        return $this->belongsTo(Level::class,'level_id');
    }
    public function classes(){
        return $this->belongsTo(Classroom::class,'classroom_id');
    }
    public function invoices(){
        return $this->hasMany(Invoice::class, 'fee_id');
    }
}
