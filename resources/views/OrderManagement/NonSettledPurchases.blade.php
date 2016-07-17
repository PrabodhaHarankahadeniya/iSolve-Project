@extends('Layouts.master')
@section('content')
<?php $name=''; ?>
<section id="table">
    <h2>Non-Settled Purchases</h2>
    <br>
    <div class="col-md-10 col-md-offset-1">
        <table class="table table-hover" >
            <tr>
                <th>Date</th>
                <th>Purchase ID</th>
                <th>Type</th>
                <th>Total Amount</th>
                <th>Amount Settled By Cash</th>
                <th>Amount Settled By Cheques</th>
                <th>Total Amount Paid</th>

            </tr>
            <?php
            foreach ($nonSettledPurchases as $purchase){
            $cheques = $purchase->cheques;
            $chequeAmount = 0;
                $temp=$purchase;
            ?>
            <tr class="warning"  title='{{$purchase->id}}' onclick="$name=this.title,detail()" >
                <td style="display: none" id="tData">{{$purchase}}</td>
                <td>{{$purchase->date}}</td>
                <td onclick="$name=this.valueOf($purchase),detail()" value={{$purchase->id}}>{{$purchase->id}}</td>
                <?php if ($purchase->is_paddy){
                    $description = "A Paddy Purchase";
                }
                else{
                    $description = "A Rice Purchase";
                }
                ?>
                <td>{{$description}}</td>
                <td>{{$purchase->total_price}}</td>
                <td>{{$purchase->cash_amount}}</td>
                <?php
                if ($cheques == null){
                    $chequeAmount = 0;
                }
                else{
                    foreach ($cheques as $cheque){
                        $chequeAmount += $cheque->amount;
                    }
                }
                ?>
                <td>{{$chequeAmount}}</td>
                <td>{{$purchase->cash_amount + $chequeAmount}}</td>
            </tr>
            <?php
            }
            ?>
        </table>

        <script>
            function detail() {
                document.getElementById($name).style.display='';
                document.getElementById('table').style.display='none'; return false;
            }
        </script>
    </div>
</section>
    <?php
    foreach ($nonSettledPurchases as $purchase){
    ?>
    <section class="row new-post" id={{$purchase->id}} style="display:none">
        <br>
        <h1>Non Settled Purchase Detail Report </h1>
        <br>


        <div class="form-group">
            <label class="control-label col-sm-2" for="purchaseID">Purchase ID : </label>
            <lable class="control-label col-sm-2" for="pId">{{$purchase->id}}</lable>
        </div><br>
        <div class="form-group">
            <label class="control-label col-sm-2" for="supplierID">Supplier name :</label>
            <lable class="control-label col-sm-2" for="pId">{{$purchase->supplierName}}</lable>
            <lable class="control-label col-sm-2" for="sId"></lable>
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

        <div class="form-group">
            <label class="control-label col-sm-2" for="cheque">Cheque amount :</label>
            {{--cheque amount shoul be calculated--}}
            <lable class="control-label col-sm-2" for="chequeVal">{{$purchase->cheque_amount}}</lable>
        </div><br>
        <div class="form-group">
            <label class="control-label col-sm-2" for="cheque">Toatal Amount:</label>
            <lable class="control-label col-sm-2" for="chequeVal">{{$purchase->total_price}}</lable>
        </div><br>

    </section>
    <?php } ?>

@endsection