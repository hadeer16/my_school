<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['content','classroom_id','user_id'];

    public function classes(){
        return $this->belongsTo(Classroom::class,'classroom_id');
    }
    public function users(){
        return $this->belongsTo(User::class ,'user_id');
    }
}
