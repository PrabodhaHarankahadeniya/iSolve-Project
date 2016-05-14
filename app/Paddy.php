<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paddy extends Model
{
    public function paddystock(){
        return $this->belongsTo('App\PaddyStock');
    }
    protected $table = "paddystock";
    
}
