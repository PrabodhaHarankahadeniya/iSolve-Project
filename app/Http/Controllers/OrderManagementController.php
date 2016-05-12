<?php
namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderManagementcontroller extends controller{
    
    public function getPurchasePaddyForm(){
        return view('PurchasePaddyForm');
        
    }
    public function getPurchaseRiceForm(){
        return view('PurchaseRiceForm');
    }
    public function getSellRiceForm(){
        return view('SellRiceForm');
    }
    public function getSellFlourForm(){
        return view('SellFlourForm');
    }
    
}