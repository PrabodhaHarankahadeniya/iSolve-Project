<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function customers(){
        return $this->belongsTo(Customer::class);
    }

    public function cheques(){
        return $this->hasMany(Cheque::class);
    }
}
