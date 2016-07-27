@extends('Layouts.master')

@section('style')
    <style>
        h1{
            text-align: center;
            font-family: Times;

        }
        input{
            border: none;
        }

    </style>

@endsection

@section('content')


    <section class="row new-post">

        <div class="page-header">
        <h1>Non Settled Purchase Detail Report </h1>
        </div><br><br>
        <?php $suppliers = \App\Supplier::all();
        $name=null;
        foreach ($suppliers as $supplier){
            if ($supplier->id == $purchase->supplier_id){
                $name=$supplier->name;
            }
        }?>

        <form  action="{{route('settlePurchase')}}"method="post">
            <table class="table  table-bordered">
                <tbody>
                    <div>
                        <tr>
                            <td>Purchase ID : </td>
                            <td><input type="text"  name="id" id="id" value="{{$purchase->id}}" readonly></td>
                        </tr>
                        <tr>
                            <td>Supplier name : </td>
                            <td><input type="text" name="id" id="id" value="{{$name}}" readonly></td>
                        </tr>
                        <tr>
                            <td>Date : </td>
                            <td><input type="text"  name="id" id="id" value="{{$purchase->date}}" readonly></td>
                        </tr>
                        <tr>
                            <td>Purchase Item : </td>
                            <td><input type="text"  name="id" id="id" value="{{$purchase->purchase_item}}" readonly></td>
                        </tr>
                        <tr>
                            <td>Cash Amount : </td>
                            <td><input type="text"  name="id" id="id" value="{{$purchase->cash_amount}}" readonly></td>
                        </tr>
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
                        <tr>
                            <td>Cheque Amount : </td>
                            <td><input type="text" name="id" id="id" value="{{$chequeAmount}}" readonly></td>
                        </tr><tr>
                            <td>Total Price : </td>
                            <td><input type="text"  name="id" id="id" value="{{$purchase->total_price}}" readonly></td>
                        </tr>

                    </div>
                </tbody>
            </table>


        <br><br><br>
            <div class="page-header">
                <h3><strong>Transaction Settlement method</strong></h3>
            </div>
            <div class="form-group">
                <label for="date">Date</label>
                <input type="date" class="form-control" id="date" placeholder="Date" name="date"
                       required max="{{date("Y-m-d")}}">
            </div>
        <br><br>
            <table class="table">
                <tr>
                    <td>
                        <input onclick="document.getElementById('cash').disabled = false;
                        document.getElementById('cheque1').disabled = true;
                        document.getElementById('cheque2').disabled = true;
                        document.getElementById('cheque3').disabled = true;
                        document.getElementById('cheque4').disabled = true;
                        document.getElementById('cheque5').disabled = true;

                        document.getElementById('chequeRadio').checked = false;
                        document.getElementById('bothRadio').checked = false;" type="radio"
                               name="cashRadio" id="cashRadio" checked>
                        <label for="cheques">By Cash</label>
                    </td>
                    <td>
                        <input onclick="document.getElementById('cash').disabled = true;
                        document.getElementById('cheque1').disabled = false;
                        document.getElementById('cheque2').disabled = false;
                        document.getElementById('cheque3').disabled = false;
                        document.getElementById('cheque4').disabled = false;
                        document.getElementById('cheque5').disabled = false;
                        document.getElementById('cashRadio').checked = false;
                        document.getElementById('bothRadio').checked = false;" type="radio"
                               name="chequeRadio" id="chequeRadio">
                        <label for="cheques">By Cheques</label>
                    </td>
                    <td>
                        <input onclick="document.getElementById('cash').disabled = false;
                        document.getElementById('cheque1').disabled = false;
                        document.getElementById('cheque2').disabled = false;
                        document.getElementById('cheque3').disabled = false;
                        document.getElementById('cheque4').disabled = false;
                        document.getElementById('cheque5').disabled = false;
                        document.getElementById('chequeRadio').checked = false;
                        document.getElementById('cashRadio').checked = false;" type="radio"
                               name="bothRadio" id="bothRadio">
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
                <input type="number" class="form-control" id ="cash"  placeholder="amount"
                       name="cashAmount" min="0">
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
                    <input type="number" class="form-control" id="cheque1" disabled="disabled"
                           name="chequeAmount" required min="0">
                </div>
            </div>

            <div class="form-group" >
                <label for="chequeNo">Cheque No</label>
                <input type="number" class="form-control" id="cheque2" disabled="disabled"
                       name="chequeNo" required>
            </div>
            <br><br>
            <div class="form-group">
                <label for="bank">Bank</label>
                <input type="text" class="form-control" id="cheque3" disabled="disabled" name="bank" required>
            </div>
            <div class="form-group">
                <label for="branch">Branch</label>
                <input type="text" class="form-control" id="cheque4" disabled="disabled" name="branch" required>
            </div>
            <br><br>
            <div class="form-group">
                <label for="dueDate">Due date</label>
                <input type="date" class="form-control" id="cheque5" disabled="disabled" name="dueDate" required>
            </div>
        </div>

        <br><br>
        <h4><strong>Settled Status of the purchase</strong></h4>
        <table class="table">
            <tr>
                <td>
                    <label for="settle">
                        <input onclick= "document.getElementById('notSettleRadio').checked = false;" type="radio" name="settleRadio" id="settleRadio" checked>
                        Settled</label>
                </td>
                <td>
                    <label for="notSettle">
                        <input onclick= "document.getElementById('settleRadio').checked = false;" type="radio" name="settleRadio" id="settleRadio">
                        Not settled</label>
                </td>
            </tr>
        </table>

        <br>
        <button type="submit" class="btn btn-primary"> Submit </button>
        <input  type="hidden" name="_token" value="{{Session::token()}}">
        <br><br><br><br><br><br>

    </form>
</div>
    </section>

    @endsection