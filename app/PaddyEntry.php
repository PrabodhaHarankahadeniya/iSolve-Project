<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaddyEntry extends Model
{
    public function paddystock(){
        return $this->belongsTo('App\PaddyStock');
    }
}
