<?php
namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Supplier;
use App\Cheque;
use App\Purchase;
use Faker\Provider\DateTime;
use DB;

class OrderManagementcontroller extends controller{
    
    public function getPurchasePaddyForm(){
        return view('orderManagement.PurchasePaddyForm');
        
    }
    
    public function getPurchaseRiceForm(){
        return view('orderManagement.PurchaseRiceForm');
    }
    
    public function getSellRiceForm(){
        return view('orderManagement.SellRiceForm');
    }
    
    public function getSellFlourForm(){
        return view('orderManagement.SellFlourForm');
    }
    
    public function createPaddyPurchase(Request $request){
        
        $suppliers = Supplier::all();
        foreach ($suppliers as $supplier){
            if($supplier->name === $request['supplierName'])
                $supplier_id = $supplier->id;
        }

        $date = $request['date'];
        $purchase_item = $request['purchaseItem'];
        $quantity = $request['quantity'];
        $unit_price= $request['unitPrice'];
        $cash_amount= $request['cashAmount'];
        $is_paddy= true;
        if ($request['settleRadio'] === 'on')
            $settle_status = true;
        if ($request['notSettleRadio'] === 'on')
            $settle_status = false;
        $total_price =$request['totalPrice'];
        $cheque_amount= $request['chequeAmount'];
        $cheque_no= $request['chequeNo'];
        $bank= $request['bank'];
        $branch= $request['branch'];
        $due_date= $request['dueDate'];
        if ($request['cashRadio'] === 'on')
            $transaction_method = 'cash';
        if ($request['chequeRadio'] === 'on')
            $transaction_method = 'cheque';
        if ($request['bothRadio'] === 'on')
            $transaction_method = 'both';



        $purchase = new Purchase();
        $purchase->supplier_id= $supplier_id;
        $purchase->date= $date;
        $purchase->purchase_item= $purchase_item;
        $purchase->unit_price= $unit_price;
        $purchase->quantity= $quantity;
        $purchase->transaction_method= $transaction_method;
        if ($transaction_method === 'cheque')
            $purchase->cash_amount= 0;
        else
            $purchase->cash_amount= $cash_amount;

        $purchase->settle_status= $settle_status;
        $purchase->total_price= $total_price;
        $purchase->is_paddy= $is_paddy;

        $purchase->save();
        
        if($transaction_method ==='cheque' or $transaction_method ==='both') {

            $cheque = new Cheque();
            $cheque->cheque_no = $cheque_no;
            $cheque->amount = $cheque_amount;
            $cheque->bank = $bank;
            $cheque->branch = $branch;
            $cheque->date = $date;
            $cheque->due_date = $due_date;
            $cheque->settled_status = false;
            $cheque->returned_status = false;
            $cheque->payable_status = true;
            $cheque->purchase_id =$purchase->id;
            
            $cheque->save();

        }
        
        return view('OrderManagement.SuccessfulPaddyOrder');

    }

    public function createRicePurchase(Request $request){

        $suppliers = Supplier::all();


        foreach ($suppliers as $supplier){
            if($supplier->name === $request['supplierName'])
                $supplier_id = $supplier->id;
        }

        $date = $request['date'];
        $purchase_item = $request['purchaseItem'];
        $quantity = $request['quantity'];
        $unit_price= $request['unitPrice'];
        $cash_amount= $request['cashAmount'];
        $is_paddy= false;
        if ($request['settleRadio'] === 'on')
            $settle_status = true;
        if ($request['notSettleRadion'] === 'on')
            $settle_status = false;
        $total_price =$request['totalPrice'];
        $cheque_amount= $request['chequeAmount'];
        $cheque_no= $request['chequeNo'];
        $bank= $request['bank'];
        $branch= $request['branch'];
        $due_date= $request['dueDate'];
        if ($request['cashRadio'] === 'on')
            $transaction_method = 'cash';
        if ($request['chequeRadio'] === 'on')
            $transaction_method = 'cheque';
        if ($request['bothRadio'] === 'on')
            $transaction_method = 'both';



        $purchase = new Purchase();
        $purchase->supplier_id= $supplier_id;
        $purchase->date= $date;
        $purchase->purchase_item= $purchase_item;
        $purchase->unit_price= $unit_price;
        $purchase->quantity= $quantity;
        $purchase->transaction_method= $transaction_method;
        if ($transaction_method === 'cheque')
            $purchase->cash_amount= 0;
        else
            $purchase->cash_amount= $cash_amount;
        $purchase->is_paddy= $is_paddy;
        $purchase->settle_status= $settle_status;
        $purchase->total_price= $total_price;

        $purchase->save();

        if($transaction_method ==='cheque' or $transaction_method ==='both') {

            $cheque = new Cheque();
            $cheque->cheque_no = $cheque_no;
            $cheque->amount = $cheque_amount;
            $cheque->bank = $bank;
            $cheque->branch = $branch;
            $cheque->date = $date;
            $cheque->due_date = $due_date;
            $cheque->settled_status = false;
            $cheque->returned_status = false;
            $cheque->payable_status = true;
            $cheque->purchase_id =$purchase->id;
            $cheque->supplier_id = 0;

            $cheque->save();

        }

        return view('orderManagement.SuccessfulRiceOrder');
    }

    public function createPaddyPurchaseInvoice(Request $request){

        $supplierName =$request['supplierName'];
        $date = $request['date'];
        $purchaseItem = $request['purchaseItem'];
        $quantity = $request['quantity'];
        $unitPrice= $request['unitPrice'];
        $totalAmount = $unitPrice * $quantity;
        
        $purchaseDetails = [$supplierName, $date, $purchaseItem, $quantity, $unitPrice, $totalAmount];
        return view('OrderManagement.PaddyInvoice',compact('purchaseDetails'));
    }

    public function createRicePurchaseInvoice(Request $request){

        $supplierName =$request['supplierName'];
        $date = $request['date'];
        $purchaseItem = $request['purchaseItem'];
        $quantity = $request['quantity'];
        $unitPrice= $request['unitPrice'];
        $totalAmount = $unitPrice * $quantity;

        $purchaseDetails = [$supplierName, $date, $purchaseItem, $quantity, $unitPrice, $totalAmount];
        return view('OrderManagement.RiceInvoice',compact('purchaseDetails'));
    }

    public function createRiceOrder(Request $request){

        $customerName =$request['customerName'];
        $date = $request['date'];
        $orderDetails = [$customerName, $date];
        $totalAmount =0;
        for ($i =1; $i<12; $i++){
            if ($request['unitPrice'.$i] === null)
                break;
            else{
                array_push($orderDetails,$request['orderItem'.$i]);
                array_push($orderDetails,$request['quantity'.$i]);
                array_push($orderDetails,$request['unitPrice'.$i]);
                $totalAmount +=$request['quantity'.$i] * $request['unitPrice'.$i];
            }

        }


        return view('OrderManagement.RiceOrder',compact('orderDetails'));
    }

    public function createFlourOrder(Request $request){
        $customerName =$request['customerName'];
        $date = $request['date'];
        $orderDetails = [$customerName, $date];
        $totalAmount =0;
        for ($i =1; $i<12; $i++){
            if ($request['unitPrice'.$i] === null)
                break;
            else{
                array_push($orderDetails,$request['orderItem'.$i]);
                array_push($orderDetails,$request['quantity'.$i]);
                array_push($orderDetails,$request['unitPrice'.$i]);
                $totalAmount +=$request['quantity'.$i] * $request['unitPrice'.$i];
            }

        }


        return view('OrderManagement.RiceOrder',compact('orderDetails'));
    }
        
       



}