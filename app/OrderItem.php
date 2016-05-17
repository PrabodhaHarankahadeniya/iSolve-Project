<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    public function Orders(){
        return $this->belongsTo(Order::class);
    }
}
