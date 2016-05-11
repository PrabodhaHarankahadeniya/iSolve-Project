<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clerk extends Model
{

    private $userName;
    private $password;

    function __construct($name, $nicNo, $gender, $username, $password) {
        parent::__construct($name, $nicNo, $gender);

        $this->username = $username;
        $this->password = $password;
    }

    public function setUserName($userName) {
        $this->userName = $userName;
    }

    public function setPassword($password) {
        $this->password = $password;
    }

    public function getUserName($userName) {
        $this->userName = $userName;
    }

    public function getPassword($password) {
        $this->password = $password;
    }

    public function searchEmployee($name) {

    }

    public function updateEmployee($name, $nicNo, $gender, $teleNo, $userName, $password) {

    }

    public function markingAttendance() {

    }

    public function creatOrder($orderNo) {

    }

    public function createSupplyTransaction($supplyTransNo) {

    }

    public function searchCustomer($customerName) {

    }

    public function searchSupplier($supplierName) {

    }

    public function addRiceToStock($amount, $type) {

    }

    public function addFlourToStock($amount, $type) {

    }

    public function addPaddyToStock($amount, $type) {

    }

    public function getRiceFromStock($amount, $type) {

    }

    public function getPaddyFromStock($amount, $type) {

    }

    public function getFlourFromStock($amount, $type) {

    }

    public function addnewCustomer($name, $telNo, $nameOfShop) {

    }

    public function addnewSupplier($name, $telNo) {

    }
}
