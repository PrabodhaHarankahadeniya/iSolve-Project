<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FlourEntry extends Model
{
    public function flourstock(){
        return $this->belongsTo('App\FlourStock');
    }
}
