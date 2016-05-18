<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FlourStock extends Model
{
    protected $table = "stocks";
    public function flour(){
        return $this->hasMany('App\FlourEntry');
    }
    private static $flourStock=NULL;
    private static $flour= array();
   
    public static function getFlourStock(){
        if(FlourStock::$flourStock==NULL){
            FlourStock::$flourStock=new FlourStock ();


        }
        return FlourStock::$flourStock;

    }

    private function _constructor($capacity) {
        parent::__construct($capacity);
    }

    public static function getFlourList(){
        return FlourStock::$flour;
    }

    public static function setFlourList(){

    }
    public function addFlour($amount,$type) {

    }

    public function getFlour($amount,$type) {

    }
}
