<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaddyStock extends Model
{private static $paddyStock=NULL;
    private static $paddy = array();
    public function paddy(){
        return $this->hasMany('App\Paddy');
    }
    public static function getRiceStock(){
        if(PaddyStock::$paddyStock==NULL){
            PaddyStock::$paddyStock=new PaddyStock ();


        }
        return PaddyStock::$paddyStock;

    }

    private function _constructor($capacity) {
        parent::__construct($capacity);
    }

    public static function getPaddyList(){
        return PaddyStock::$paddy;
    }

    public static function setPaddyList(){

    }


}
