<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cheque extends Model
{
    public function purchases(){
        return $this->belongsTo(Purchase::class);
    }
}
