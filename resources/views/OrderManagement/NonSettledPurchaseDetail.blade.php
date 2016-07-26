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
        <h1>Non Settled Purchase Detail Report </h1>
        <br>
        <?php $suppliers = \App\Supplier::all();
        $name=null;
        foreach ($suppliers as $supplier){
            if ($supplier->id == $purchase->supplier_id){
                $name=$supplier->name;
            }
        }?>

        <form  method="post">
        <div class="form-group">
            <label class="control-label col-sm-2" for="purchaseID">Purchase ID : </label>
            <label class="control-label col-sm-2" for="pId">{{$purchase->id}}</label>
        </div><br>
        <div class="form-group">
            <label class="control-label col-sm-2" for="supplierID">Supplier name :</label>
            {{--supplier name should be add--}}
            <label class="control-label col-sm-2" for="sId">{{$name}}</label>
        </div><br>
        <div class="form-group">
            <label class="control-label col-sm-2" for="date">Date :</label>
            <label class="control-label col-sm-2" for="date">{{$purchase->date}}</label>
        </div><br>
        <div class="form-group">
            <label class="control-label col-sm-2" for="purchaseItem">Purchase item :</label>
            <label class="control-label col-sm-2" for="item">{{$purchase->purchase_item}}</label>
        </div><br>
        <div class="form-group">
            <label class="control-label col-sm-2" for="cash">Cash amount :</label>
            <label class="control-label col-sm-2" for="cashVal">{{$purchase->cash_amount}}</label>
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
            <label class="control-label col-sm-2" for="cheque">Total Amount:</label>
            <lablel class="control-label col-sm-2" for="chequeVal">{{$purchase->total_price}}</lablel>
        </div><br>

    </section>
        <br><br><br>
        <h4><strong>Transaction Settlement method</strong></h4>

        <br><br>
        <table class="table">
            <tr>
                <td>
                    <input onclick="document.getElementById('cash').disabled = false; document.getElementById('cheque1').disabled = true;
                                document.getElementById('cheque2').disabled = true;
                                document.getElementById('cheque3').disabled = true;
                                document.getElementById('cheque4').disabled = true;
                                document.getElementById('cheque5').disabled = true;
                                document.getElementById('chequeRadio').checked = false;
                                document.getElementById('bothRadio').checked = false;" type="radio" name="cashRadio" id="cashRadio">
                    <label for="cheques">By Cash</label>
                </td>
                <td>
                    <input onclick="document.getElementById('cash').disabled = true; document.getElementById('cheque1').disabled = false;
                                document.getElementById('cheque2').disabled = false;
                                document.getElementById('cheque3').disabled = false;
                                document.getElementById('cheque4').disabled = false;
                                document.getElementById('cheque5').disabled = false;
                                document.getElementById('cashRadio').checked = false;
                                document.getElementById('bothRadio').checked = false;" type="radio" name="chequeRadio" id="chequeRadio">
                    <label for="cheques">By Cheques</label>
                </td>
                <td>
                    <input onclick="document.getElementById('cash').disabled = false; document.getElementById('cheque1').disabled = false;
                                document.getElementById('cheque2').disabled = false;
                                document.getElementById('cheque3').disabled = false;
                                document.getElementById('cheque4').disabled = false;
                                document.getElementById('cheque5').disabled = false;
                                document.getElementById('chequeRadio').checked = false;
                                document.getElementById('cashRadio').checked = false;" type="radio" name="bothRadio" id="bothRadio">
                    <label for="cheques">By Cash and Cheques</label>
                </td>
            </tr>
        </table>
        <br><br>
        <h4><strong>Paid by Cash</strong></h4>
        <hr>
        <div class="form-inline">
            <label for="amount">Amount</label>
            <div class="input-group">
                <div class="input-group-addon">Rs</div>
                <input type="number" class="form-control" id ="cash" disabled="disabled" placeholder="amount" name="cashAmount">
            </div>
        </div>
        <br><br>
        <h4><strong>Paid by Cheques</strong></h4>
        <hr>
        <div class="form-inline" >
            <div class="form-group" >
                <label for="amount">Amount</label>
                <div class="input-group">
                    <div class="input-group-addon">Rs</div>
                    <input type="number" class="form-control" id="cheque1" disabled="disabled" name="chequeAmount">
                </div>
            </div>

            <div class="form-group" >
                <label for="chequeNo">Cheque No</label>
                <input type="number" class="form-control" id="cheque2" disabled="disabled" name="chequeNo">
            </div>
            <br><br>
            <div class="form-group">
                <label for="bank">Bank</label>
                <input type="text" class="form-control" id="cheque3" disabled="disabled" name="bank">
            </div>
            <div class="form-group">
                <label for="branch">Branch</label>
                <input type="text" class="form-control" id="cheque4" disabled="disabled" name="branch">
            </div>
            <br><br>
            <div class="form-group">
                <label for="dueDate">Due date</label>
                <input type="date" class="form-control" id="cheque5" disabled="disabled" name="dueDate">
            </div>
        </div>

        <br><br>
        <h4><strong>Settled Status of the purchase</strong></h4>
        <table class="table">
            <tr>
                <td>
                    <label for="settle">
                        <input onclick= "document.getElementById('notSettleRadio').checked = false;" type="radio" name="settleRadio" id="settleRadio">
                        Settled</label>
                </td>
                <td>
                    <label for="notSettle">
                        <input onclick= "document.getElementById('settleRadio').checked = false;" type="radio" name="settleRadio" id="settleRadio">
                        Not settled</label>
                </td>
            </tr>
        </table>

        <br><br>
        <button type="submit" class="btn btn-primary">Create Invoice </button>
        <input  type="hidden" name="_token" value="{{Session::token()}}">
        <br><br>

    </form>
</div>


    @endsection