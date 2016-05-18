<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RiceStock extends Model
{
    protected $table = "stocks";
    public function rice(){
        return $this->hasMany('App\RiceEntry');
    }
    private static $riceStock=NULL;
    private static $rice = array();
 
    public static function getRiceStock(){
        if(RiceStock::$riceStock==NULL){
            RiceStock::$riceStock=new RiceStock ();


        }
        return RiceStock::$riceStock;

    }

    private function _constructor($capacity) {
        parent::__construct($capacity);
    }

    public static function getRiceList(){
        return RiceStock::$rice;
    }

    public static function setRiceList(){

    }
    public function addRice($amount,$type) {

    }

    public function getRice($amount,$type) {

    }
}
