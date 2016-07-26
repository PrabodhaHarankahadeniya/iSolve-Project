@extends('Layouts.master')


@section('style')
    <style>
        h1{
            text-align: center;
            font-family: Times;

        }

    </style>

@endsection
@section('content')

    <section class="row new-post">

        <br>
        <h1>Settled Order Detail Report </h1>
        <br>

        <?php $order_items =$order->orderItems;
       ?>

        <div class="form-group">
            <label class="control-label col-sm-2" for="orderID">Order ID : </label>
            <lable class="control-label col-sm-2" for="oId">{{$order->id}}</lable>
        </div><br>
        <?php $customers = \App\Customer::all();
        foreach ($customers as $customer){
            if ($customer->id == $order->customer_id){
                $name=$customer->name;
            }
        }?>
        <div class="form-group">
            <label class="control-label col-sm-2" for="customerID">Customer name :</label>
            {{--supplier name should be add--}}
            <lable class="control-label col-sm-2" for="scId">{{$name}}</lable>
        </div><br>
        <div class="form-group">
            <label class="control-label col-sm-2" for="date">Date :</label>
            <lable class="control-label col-sm-2" for="date">{{$order->date}}</lable>
        </div><br>
        <div class="form-group">
            <label class="control-label col-sm-2" for="orderItem">Order item :</label>
            <?php foreach ($order_items as $item){
            $itemName=$item->name; ?>
                <lablel class="control-label col-sm-2" for="item">{{$itemName}}</lablel>
            <?php } ?>
        </div><br>

        <div class="form-group">
            <label class="control-label col-sm-2" for="cash">Amount paid in cash :</label>
            {{----}}
            <lablel class="control-label col-sm-2" for="cashVal">{{$order->cash_amount}}</lablel>
        </div><br>
        <?php
        $cheques = $order->cheques;
        $chequeAmount = 0;

        if ($cheques == null){
            $chequeAmount = 0;
        }
        else{
            foreach ($cheques as $cheque){
                $chequeAmount += $cheque->amount;
            }
        }

        ?>
        <div class="form-group">
            <label class="control-label col-sm-2" for="cheque">Cheque amount :</label>
            {{--cheque amount shoul be calculated--}}
            <lable class="control-label col-sm-2" for="chequeVal">{{$chequeAmount}}</lable>
        </div><br>
        <div class="form-group">
            <label class="control-label col-sm-2" for="totalAmount">Total Amount :</label>
            <lablel class="control-label col-sm-2" for="item">{{$order->total_price}}</lablel>
        </div><br>

    </section>
@endsection