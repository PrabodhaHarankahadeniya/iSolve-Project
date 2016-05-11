<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RiceStock extends Model
{
    private static $rice = array();
    public function _constructor($capacity) {
        parent::__construct($capacity);
    }

    public static function getRiceList(){

    }

    public static function setRiceList(){

    }
    public function addRice($amount,$type) {

    }

    public function getRice($amount,$type) {

    }
}
