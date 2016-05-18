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
        <h1>Purchase Detail Report </h1>
        <br>

        <form action="#" class="form-horizontal" role="form" method="post">

            <div class="form-group">
                <label class="control-label col-sm-2" for="purchaseID">Purchase ID :</label>
                <lable class="col_sm_2" for="pId">{{$purchase->id}}</lable>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="supplierID">Supplier ID :</label>
                <lable class="col_sm_2" for="sId">{{$purchase->id}}</lable>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="date">Date :</label>
                <lable class="col_sm_2" for="date">{{$purchase->date}}</lable>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="purchaseItem">Purchase item :</label>
                <lable class="col_sm_2" for="item">{{$purchase->purchase_item}}</lable>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="cash">Cash amount :</label>
                <lable class="col_sm_2" for="cashVal">{{$purchase->cash_amount}}</lable>
            </div>
        </form>
    </section>
@endsection