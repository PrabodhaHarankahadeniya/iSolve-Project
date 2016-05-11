<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FlourStock extends Model
{
    private $flour = array();

    public function _constructor($capacity) {
        parent::__construct($capacity);
    }

    public function addFlour($amount, $type) {

    }

    public function getFlour($amount, $type) {

    }
}
