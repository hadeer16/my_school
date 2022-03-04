<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class BoxStudent extends Model
{
    protected $fillable=['receipt_id','debit','credit','text'];

    public function receipts(){
        return $this->hasMany(Receipt::class,'receipt_id');
    }
}
