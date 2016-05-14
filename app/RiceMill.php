<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RiceMill extends Model
{
    private static $customers = array();
    private static $suppliers = array();
    private static $employees = array();
    private static $stocks = array();

    private static $riceMill=NULL;


    private function _construct() {

    }


    public static function getRiceMill(){
        if(RiceMill::$riceMill==NULL){
            RiceMill::$riceMill=new RiceMill ();
        }
        return RiceMill::$riceMill;

    }

    public static function getCustomerList() {
        return RiceMill::$customers;
    }

    public static function getSupplierList() {
        return RiceMill::$suppliers;
    }

    public static function getEmployeeList() {
        return RiceMill::$employees;
    }

    public static function getStocks() {
        return RiceMill::$stocks;
    }



}
