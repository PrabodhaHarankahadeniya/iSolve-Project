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



        <div class="form-group">
            <label class="control-label col-sm-2" for="orderID">Order ID : </label>
            <lable class="control-label col-sm-2" for="oId">{{$order->id}}</lable>
        </div><br>
        <div class="form-group">
            <label class="control-label col-sm-2" for="customerID">Customer name :</label>
            {{--supplier name should be add--}}
            <lable class="control-label col-sm-2" for="scId"></lable>
        </div><br>
        <div class="form-group">
            <label class="control-label col-sm-2" for="date">Date :</label>
            <lable class="control-label col-sm-2" for="date">{{$order->date}}</lable>
        </div><br>
        <div class="form-group">
            <label class="control-label col-sm-2" for="totalAmount">Total Amount :</label>
            <lable class="control-label col-sm-2" for="item">{{$order->total_price}}</lable>
        </div><br>
        <div class="form-group">
            <label class="control-label col-sm-2" for="cash">Amount paid in cash :</label>
            {{----}}
            <lable class="control-label col-sm-2" for="cashVal">{{$order->cash_amount}}</lable>
        </div><br>

        <div class="form-group">
            <label class="control-label col-sm-2" for="cheque">Amount paid in cheques :</label>
            {{--cheque amount shoul be calculated--}}
            <lable class="control-label col-sm-2" for="chequeVal">{{$order->cheque_amount}}</lable>
        </div><br>
        <div class="form-group">
            <label class="control-label col-sm-2" for="cheque">Toatal Amount paid:</label>
            {{----}}
            <lable class="control-label col-sm-2" for="chequeVal"></lable>
        </div><br>

    </section>
@endsection