<?php
namespace App\Http\Controllers;
use App\FlourEntry;
use App\RiceEntry;
use App\PaddyEntry;
use App\Customer;
use App\Order;
use App\OrderItem;
use Illuminate\Http\Request;
use App\Supplier;
use App\Cheque;
use App\Purchase;
//use Faker\Provider\DateTime;
use DB;

use App\User;
use App\PaddyStock;
use App\RiceStock;
use App\FlourStock;
use Faker\Provider\DateTime;

use Illuminate\Support\Facades\Auth;


class OrderManagementcontroller extends controller{
    
    public function getPurchasePaddyForm(){
        $wrong = null;
        return view('orderManagement.PurchasePaddyForm',compact('wrong'));
        
    }
    
    public function getPurchaseRiceForm(){
        $wrong = null;
        return view('orderManagement.PurchaseRiceForm',compact('wrong'));
    }
    
    public function getSellRiceForm(){
        $wrong =null;
        return view('orderManagement.SellRiceForm',compact('wrong'));
    }
    
    public function getSellFlourForm(){
        $wrong =null;
        return view('orderManagement.SellFlourForm',compact('wrong'));
    }
    
    public function createPaddyPurchase(Request $request){

        $supplier_id =\DB::table('suppliers')
            ->where('name',$request['supplierName'])->value('id');

//        $supplier_id = null;
//        $suppliers = Supplier::all();
//        foreach ($suppliers as $supplier){
//            if($supplier->name === $request['supplierName'])
//                $supplier_id = $supplier->id;
//        }
//
//        if($supplier_id == null){
//            $wrong="Supplier does not exist! Please add supplier before purchasing";
//            return view('orderManagement.PurchasePaddyForm',compact('wrong'));
//        }

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
        /////////////////////////////////////////////
        if($purchase_item=="Red Samba") $type="RedSamba";
        if($purchase_item=="Red Nadu") $type="RedNadu";
        if($purchase_item=="Kiri Samba") $type="KiriSamba";
        else$type=$purchase_item;
        $paddyEntry = new PaddyEntry();
        $paddyEntry->type = $type;
        $paddyEntry->quantity_in_kg = $quantity;
        $paddyEntry->transfer_status = "add";
        $paddyEntry->date =$date;
        $paddyEntry->save();
        $p = \DB::table('paddy_stock')->where('type', $type)->value('quantity_in_kg');
        \DB::table('paddy_stock')
            ->where('type', $type)
            ->update(['quantity_in_kg' => $p + $quantity]);
        DB::table('paddy_stock')
            ->update(['updated_at' => date("Y.m.d")]);
        return view('OrderManagement.SuccessfulPaddyPurchase');

    }

    public function createRicePurchase(Request $request){

        $supplier_id =\DB::table('suppliers')
            ->where('name',$request['supplierName'])->value('id');
//        $suppliers = Supplier::all();
//        $supplier_id = null;
//        foreach ($suppliers as $supplier){
//            if($supplier->name === $request['supplierName'])
//                $supplier_id = $supplier->id;
//        }
//
//        if($supplier_id == null){
//            $wrong="Supplier does not exist! Please add supplier before purchasing";
//            return view('orderManagement.PurchaseRiceForm',compact('wrong'));
//        }

        $date = $request['date'];
        $purchase_item = $request['purchaseItem'];
        $quantity = $request['quantity'];
        $unit_price= $request['unitPrice'];
        $cash_amount= $request['cashAmount'];
        $is_paddy= false;
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
        /////////////////////////////////////////////
        if($purchase_item=="Red Samba") $type="RedSamba";
        if($purchase_item=="Red Nadu") $type="RedNadu";
        if($purchase_item=="Kiri Samba") $type="KiriSamba";
        else$type=$purchase_item;
        $riceEntry = new RiceEntry();
        $riceEntry->type = $type;
        $riceEntry->quantity_in_kg = $quantity;
        $riceEntry->transfer_status = "add";
        $riceEntry->date =$date;
        $riceEntry->save();
        $p = \DB::table('rice_stock')->where('type', $type)->value('quantity_in_kg');
        \DB::table('rice_stock')
            ->where('type', $type)
            ->update(['quantity_in_kg' => $p + $quantity]);
        DB::table('rice_stock')
            ->update(['updated_at' => date("Y.m.d")]);


        return view('orderManagement.SuccessfulRicePurchase');
    }

    public function createPaddyPurchaseInvoice(Request $request){

        $supplierName =\DB::table('suppliers')
            ->where('name',$request['supplierName'])->value('name');
        
        if($supplierName==null){
            $wrong="Supplier does not exist! Please add supplier before purchasing";
            return view('orderManagement.PurchasePaddyForm',compact('wrong'));
        }
        else {


            $date = $request['date'];
            $purchaseItem = $request['purchaseItem'];
            $quantity = $request['quantity'];
            $unitPrice = $request['unitPrice'];
            $totalAmount = $unitPrice * $quantity;

            $purchaseDetails = [$supplierName, $date, $purchaseItem, $quantity, $unitPrice, $totalAmount];
            return view('OrderManagement.PaddyInvoice', compact('purchaseDetails'));
        }
    }

    public function createRicePurchaseInvoice(Request $request){

        $supplierName =\DB::table('suppliers')
            ->where('name',$request['supplierName'])->value('name');

        if($supplierName==null){
            $wrong="Supplier does not exist! Please add supplier before purchasing";
            return view('orderManagement.PurchaseRiceForm',compact('wrong'));
        }
        else {


            $date = $request['date'];
            $purchaseItem = $request['purchaseItem'];
            $quantity = $request['quantity'];
            $unitPrice = $request['unitPrice'];
            $totalAmount = $unitPrice * $quantity;

            $purchaseDetails = [$supplierName, $date, $purchaseItem, $quantity, $unitPrice, $totalAmount];
            return view('OrderManagement.RiceInvoice', compact('purchaseDetails'));
        }
    }

    public function createRiceOrder(Request $request){
        $customerName =$request['customerName'];
        $customer_id = null;

        $customer_id = \DB::table('customers')
        ->where('name',$customerName)->value('id');


        if ($customer_id == null){
            $wrong = "Customer does not exist! Please add Customer before selling";
            return view('orderManagement.SellRiceForm',compact('wrong'));
        }
        else {
            $date = $request['date'];
            $orderDetails = [$customerName, $date];
            $totalAmount = 0;
            $numberOfItems = 0;
            for ($i = 1; $i < 12; $i++) {
                if (($request['unitPrice' . $i] == null) or ($request['quantity' . $i] == null)) {
                    break;
                } else {
                    array_push($orderDetails, $request['orderItem' . $i]);
                    array_push($orderDetails, $request['quantity' . $i]);
                    array_push($orderDetails, $request['unitPrice' . $i]);
                    $totalAmount += ($request['quantity' . $i] * $request['unitPrice' . $i]);
                    $numberOfItems += 1;
                }

            }
            array_push($orderDetails, $numberOfItems);
            array_push($orderDetails, $totalAmount);
            ////////////////////////////////////////////////////////////////////////
            $flag = 1;
            for ($i = 2; $i <= $numberOfItems * 3; $i += 3) {
                if ($orderDetails[$i] == "Red Samba") $type = "RedSamba";
                else if ($orderDetails[$i] == "Red Nadu") $type = "RedNadu";
                else if ($orderDetails[$i] == "Kiri Samba") $type = "KiriSamba";
                else if ($orderDetails[$i] == "Kekulu Samba") $type = "KekuluSamba";
                else if ($orderDetails[$i] == "Sudu Kekulu") $type = "SuduKekulu";
                else if ($orderDetails[$i] == "Red Kekulu") $type = "RedKekulu";
                else if ($orderDetails[$i] == "Kekulu Kiri") $type = "KekuluKiri";
                else$type = $orderDetails[$i];
                $p = \DB::table('rice_stock')->where('type', $type)->value('quantity_in_kg');
                if ($p >= $orderDetails[$i + 1]) {

                    $p = \DB::table('rice_stock')->where('type', $type)->value('quantity_in_kg');
                    \DB::table('rice_stock')
                        ->where('type', $type)
                        ->update(['quantity_in_kg' => $p - $orderDetails[$i + 1]]);
                    DB::table('rice_stock')
                        ->update(['updated_at' => date("Y.m.d")]);
                } else {
                    $flag = 0;
                }
            }
            if ($flag == 0) {
                $wrong = "Rice stock can't satisfy those requirements..............!!!";
                return view('orderManagement.SellRiceForm', compact('wrong'));
            }
            return view('OrderManagement.RiceOrder', compact('orderDetails'));
        }
    }

    public function createFlourOrder(Request $request){
        
        $customerName =$request['customerName'];
        $customer_id = null;
        $customers = Customer::all();
        foreach ($customers as $customer){
            if($customer->name === $request['customerName'])
                $customer_id = $customer->id;
        }

        if ($customer_id == null){
            $wrong = "Customer does not exist! Please add Customer before selling";
            return view('orderManagement.SellFlourForm',compact('wrong'));
        }

        $date = $request['date'];
        $orderDetails = [$customerName, $date];
        $totalAmount =0;
        $numberOfItems =0;
        for ($i =1; $i<3; $i++){
            if (($request['unitPrice'.$i] == null) or ($request['quantity'.$i] == null)) {
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
        $flag=1;
        for($i=2;$i<=$numberOfItems*3;$i+=3) {
            if ($orderDetails[$i] == "White Rice Flour") $type = "WhiteRiceFlour";
            else if ($orderDetails[$i] == "Red Kekulu Flour") $type = "RedKekuluFlour";
            $p = \DB::table('flour_stock')->where('type', $type)->value('quantity_in_kg');
            if ($p >= $orderDetails[$i+1]) {

                $p = \DB::table('flour_stock')->where('type', $type)->value('quantity_in_kg');
                \DB::table('flour_stock')
                    ->where('type', $type)
                    ->update(['quantity_in_kg' => $p - $orderDetails[$i + 1]]);
                DB::table('flour_stock')
                    ->update(['updated_at' => date("Y.m.d")]);
               
            }
            else{$flag = 0;}
        }
        if($flag==0){
            $wrong="Flour stock can't satisfy those requirements..............!!!";
            return view('orderManagement.SellFlourForm',compact('wrong'));
        }
        return view('OrderManagement.FlourOrder', compact('orderDetails'));
    }

    public function createRiceOrderReceipt(Request $request){

        $customers = Customer::all();
        foreach ($customers as $customer){
            $customer_id=0;
            if($customer->name === $request['customerName'])
                $customer_id = $customer->id;
        }

        $date =$request['date'];
        $cash_amount =$request['cashAmount'];
        $is_rice= true;
        if ($request['settleRadio'] === 'on')
            $settle_status = true;
        if ($request['notSettleRadio'] === 'on')
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
                    $cheque->payable_status = false;
                    $cheque->purchase_id = 0;
                    $cheque->order_id = $order->id;

                    $cheque->save();
                }

            }

        }
        return view('orderManagement.SuccessfulRiceOrder');

    }

    public function createFlourOrderReceipt(Request $request){
        

        $customers = Customer::all();
        foreach ($customers as $customer){
            if($customer->name === $request['customerName'])
                $customer_id = $customer->id;
        }

        $date =$request['date'];
        $cash_amount =$request['cashAmount'];
        $is_rice= false;
        if ($request['settleRadio'] === 'on')
            $settle_status = true;
        if ($request['notSettleRadio'] === 'on')
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
                    $cheque->payable_status = false;
                    $cheque->purchase_id = 0;
                    $cheque->order_id = $order->id;

                    $cheque->save();
                }

            }

        }

        return view('orderManagement.SuccessfulFlourOrder');
    }

    public  function getSettledPurchases(){
        $settledPurchases = [];
        $purchases = Purchase::all();
        foreach ($purchases as $purchase){
            if ($purchase->settle_status) {
                array_push($settledPurchases,$purchase);
            }
        }
        return view('orderManagement.SettledPurchases',compact('settledPurchases'));
    }

    public  function getNonSettledPurchases(){
        $nonSettledPurchases = [];
        $purchases = Purchase::all();
        foreach ($purchases as $purchase){
            if (!($purchase->settle_status)) {
                array_push($nonSettledPurchases,$purchase);
            }
        }
        return view('orderManagement.NonSettledPurchases',compact('nonSettledPurchases'));
    }

    public  function getSettledOrders(){
        $settledOrders = [];
        $orders = Order::all();
        foreach ($orders as $order){
            if ($order->settle_status) {
                array_push($settledOrders,$order);
            }
        }
        return view('orderManagement.SettledOrders',compact('settledOrders'));
    }

    public  function getNonSettledOrders(){
        $nonSettledOrders = [];
        $orders = Order::all();
        foreach ($orders as $order){
            if (!($order->settle_status)) {
                array_push($nonSettledOrders,$order);
            }
        }
        return view('orderManagement.NonSettledOrders',compact('nonSettledOrders'));
    }

    public function showSettledPurchases($purchaseId){

        $purchase = Purchase::find($purchaseId);
                return view('orderManagement.SettledPurchaseDetail',compact('purchase'));


        
    }

    public function showNonSettledPurchases($purchaseId){

        $purchase = Purchase::find($purchaseId);
        return view('orderManagement.NonSettledPurchaseDetail',compact('purchase'));


        
    }

    public function showSettledOrders($orderId){
        $order = Order::find($orderId);
        return view('orderManagement.SettledOrderDetail',compact('order'));
       
    }

    public function showNonSettledOrders($orderId){

        $order = Order::find($orderId);
                return view('orderManagement.NonSettledOrderDetail',compact('order'));


    }
    public function show($id){

        $purchase = Purchase::find($id);
        return view('orderManagement.SettledPurchaseDetail',compact('purchase'));


    }
       



}