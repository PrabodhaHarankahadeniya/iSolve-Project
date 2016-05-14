<?php
namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Supplier;
use App\Cheque;
use App\Purchase;
use Faker\Provider\DateTime;
use DB;

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
    public function createPaddyPurchase(Request $request){
        $suppliers = Supplier::all();
        foreach ($suppliers as $supplier){
            if($supplier->name === $request['supplerName'])
                $supplier_id = $supplier->id;
        }

        $date = $request['date'];
        $purchaseItem = $request['purchaseItem'];
        $quantity = $request['quantity'];
        $unitPrice= $request['unitPrice'];
        $transactionMethod = $request['transactionMethod'];
        $cashAmount= $request['cashamount'];
    }
    
}