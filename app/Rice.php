<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rice extends Model
{
    public function ricestock(){
        return $this->belongsTo('App\RiceStock');
    }
}