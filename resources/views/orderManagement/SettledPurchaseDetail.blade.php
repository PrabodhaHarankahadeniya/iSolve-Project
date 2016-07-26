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
        <h1>Settled Purchase Detail Report </h1>
        <br>



        <div class="form-group">
            <label class="control-label col-sm-2" for="purchaseID">Purchase ID : </label>
            <lable class="control-label col-sm-2" for="pId">{{$purchase->id}}</lable>
        </div><br>
        <?php $suppliers = \App\Supplier::all();
        $name=null;
        foreach ($suppliers as $supplier){
            if ($supplier->id == $purchase->supplier_id){
                $name=$supplier->name;
            }
        }?>
        <div class="form-group">
            <label class="control-label col-sm-2" for="supplierID">Supplier name :</label>
            {{--supplier name should be add--}}
            <lable class="control-label col-sm-2" for="sId">{{$name}}</lable>
        </div><br>
        <div class="form-group">
            <label class="control-label col-sm-2" for="date">Date :</label>
            <lable class="control-label col-sm-2" for="date">{{$purchase->date}}</lable>
        </div><br>
        <div class="form-group">
            <label class="control-label col-sm-2" for="purchaseItem">Purchase item :</label>
            <lable class="control-label col-sm-2" for="item">{{$purchase->purchase_item}}</lable>
        </div><br>
        <div class="form-group">
            <label class="control-label col-sm-2" for="cash">Cash amount :</label>
            <lable class="control-label col-sm-2" for="cashVal">{{$purchase->cash_amount}}</lable>
        </div><br>
        <?php
        $cheques = $purchase->cheques;
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
            <label class="control-label col-sm-2" for="cheque">Toatal Amount:</label>
            <lable class="control-label col-sm-2" for="chequeVal">{{$purchase->total_price}}</lable>
        </div><br>

    </section>
@endsection