<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Myparent extends Model
{
    protected $fillable =['name_father','id_card_father','father_job','father_address','father_phone','email','password','name_mother','id_card_mother','mother_job','mother_address','mother_phone'];

    public function students(){
        return $this->hasMany(Student::class,'myparent_id');
    }
}
