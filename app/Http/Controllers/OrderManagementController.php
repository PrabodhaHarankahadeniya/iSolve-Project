<?php
namespace App\Http\Controllers;


use App\Customer;
use App\Order;
use App\OrderItem;
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
            $cheque->order_id = 0;
            
            $cheque->save();

        }
        
        return view('OrderManagement.SuccessfulPaddyPurchase');

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
            $cheque->order_id = 0;

            $cheque->save();

        }

        return view('orderManagement.SuccessfulRicePurchase');
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
        $numberOfItems =0;
        for ($i =1; $i<12; $i++){
            if ($request['unitPrice'.$i] == null) {
                break;
            }
            else{
                array_push($orderDetails,$request['orderItem'.$i]);
                array_push($orderDetails,$request['quantity'.$i]);
                array_push($orderDetails,$request['unitPrice'.$i]);
                $totalAmount +=($request['quantity'.$i] * $request['unitPrice'.$i]);
                $numberOfItems += 1;
            }

        }
        array_push($orderDetails,$numberOfItems);
        array_push($orderDetails,$totalAmount);


        return view('OrderManagement.RiceOrder',compact('orderDetails'));
    }

    public function createFlourOrder(Request $request){
        
        $customerName =$request['customerName'];
        $date = $request['date'];
        $orderDetails = [$customerName, $date];
        $totalAmount =0;
        $numberOfItems =0;
        for ($i =1; $i<12; $i++){
            if ($request['unitPrice'.$i] === null) {
                break;
            }
            else{
                array_push($orderDetails,$request['orderItem'.$i]);
                array_push($orderDetails,$request['quantity'.$i]);
                array_push($orderDetails,$request['unitPrice'.$i]);
                $totalAmount +=($request['quantity'.$i] * $request['unitPrice'.$i]);
                $numberOfItems += 1;
            }

        }
        array_push($orderDetails,$numberOfItems);
        array_push($orderDetails,$totalAmount);

        return view('OrderManagement.FlourOrder',compact('orderDetails'));
    }

    public function createRiceOrderReceipt(Request $request){

        echo $request['customer_name'];
        $customers = Customer::all();
        foreach ($customers as $customer){
            if($customer->name === $request['customer_name'])
                $customer_id = $customer->id;
        }

        $date =$request['date'];
        $cash_amount =$request['cashAmount'];
        $is_rice= true;
        if ($request['settleRadio'] === 'on')
            $settle_status = true;
        if ($request['notSettleRadion'] === 'on')
            $settle_status = false;
        $total_price =$request['totalPrice'];
        if ($request['cashRadio'] === 'on')
            $transaction_method = 'cash';
        if ($request['chequeRadio'] === 'on')
            $transaction_method = 'cheque';
        if ($request['bothRadio'] === 'on')
            $transaction_method = 'both';

        $number_of_items =$request['numberOfItems'];

        $order = new Order();
        $order->customer_id= $customer_id;
        $order->date= $date;
        $order->number_of_items= $number_of_items;
        $order->transaction_method= $transaction_method;
        if ($transaction_method === 'cheque')
            $order->cash_amount= 0;
        else
            $order->cash_amount= $cash_amount;

        $order->settle_status= $settle_status;
        $order->total_price= $total_price;
        $order->is_rice= $is_rice;

        $order->save();

        for ($i =1; $i< $number_of_items+1; $i++){

            if ($request['orderItem' . $i] == null){
                break;
            }
            else {
                $orderItem = new OrderItem();
                $orderItem->order_id = $order->id;
                $orderItem->name = $request['orderItem' . $i];
                $orderItem->quantity = $request['quantity' . $i];
                $orderItem->unit_price = $request['unitPrice' . $i];

                $orderItem->save();
            }

        }

        for ($i =1; $i < 6; $i++){

            if($transaction_method ==='cheque' or $transaction_method ==='both') {

                if ($request['chequeAmount'.$i] == null) {
                    break;
                }
                else {
                    $cheque = new Cheque();
                    $cheque->cheque_no = $request['chequeNo'.$i];
                    $cheque->amount = $request['chequeAmount'.$i];
                    $cheque->bank = $request['bank'.$i];
                    $cheque->branch = $request['branch'.$i];
                    $cheque->date = $date;
                    $cheque->due_date = $request['dueDate'.$i];
                    $cheque->settled_status = false;
                    $cheque->returned_status = false;
                    $cheque->payable_status = true;
                    $cheque->purchase_id = 0;
                    $cheque->order_id = $order->id;

                    $cheque->save();
                }

            }

        }
        echo "successful";

    }
        
       



}