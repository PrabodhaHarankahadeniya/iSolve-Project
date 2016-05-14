<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    private $name;
    private $teleNo;
    private $supplyTransactions = array();
    

    public function purchases(){
        return $this->hasMany(Purchase::class);
    }
    public function getName() {
        return $this->name;
    }

    public function getTeleNo() {
        return $this->teleNo;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function setTeleNo($teleNo) {
        $this->teleNo = $teleNo;
    }
}
