<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Box extends Model
{
    protected $fillable = ['massage','student_id'];

    public function students(){
        return $this->belongsTo(Student::class, 'student_id');
    }
}
