@extends('Layouts.master')


@section('style')
    <style>
        h1{
            text-align: center;
            font-family: Times;

        }

    </style>

@endsection
@section('header')
    <?php $users = \App\User::all();?>
    @foreach($users as $user)

        @if($user->username=="admin" and $user->user_type=="currentUser")
            @include('includes.header')
        @elseif($user->username=="clerk" and $user->user_type=="currentUser")
            @include('includes.headerClerk')

        @endif
    @endforeach
@endsection

@section('content')

    <section class="row new-post">

        <div class="page-header">
        <h1>Settled Order Detail Report </h1>
        </div><br><br>
<table class="table  table-bordered">
    <body>
        <?php $order_items =$order->orderItems;
       ?>

        <tr>
            <td>Order ID : </td>
            <td>{{$order->id}}</td>
        </tr>
        <?php $customers = \App\Customer::all();
        foreach ($customers as $customer){
            if ($customer->id == $order->customer_id){
                $name=$customer->name;
            }
        }?>
        <tr class="form-group">
            <td>Customer name :</td>
            {{--supplier name should be add--}}
            <td>{{$name}}</td>
        </tr>
        <tr class="form-group">
            <td>Date :</td>
            <td>{{$order->date}}</td>
        </tr>
        <tr>
            <td>Order item :</td>
            <?php foreach ($order_items as $item){
            $itemName=$item->name; ?>
                <td>{{$itemName}}</td>
            <?php } ?>
        </tr>

        <tr>
            <td>Amount paid in cash :</td>
            {{----}}
            <td>{{$order->cash_amount}}</td>
        </tr>
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
        <tr>
            <td>Cheque amount :</td>
            {{--cheque amount shoul be calculated--}}
            <td>{{$chequeAmount}}</td>
        </tr>
        <tr>
            <td>Total Amount :</td>
            <td>{{$order->total_price}}</td>
        </tr>
</body></table>
    </section>
@endsection