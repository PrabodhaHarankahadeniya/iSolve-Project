<?php
$numberOfItems = $orderDetails[sizeof($orderDetails)-2];
?>
@extends('Layouts.master')
@section('content')


    <h2>Flour Order</h2>
    <br>
    <div class="col-md-10 col-md-offset-1">

        <form action="{{route('createFlourOrderReceipt')}}" method="post">

            <div class="form-group">
                <label for="customerName">Customer Name</label>
                <input type="text" class="form-control" id="customerName" name="customerName" value="{{$orderDetails[0]}}" readonly>
            </div>

            <div class="form-group">
                <label for="date">Date</label>
                <input type="date" class="form-control" id="date" name="date" value="{{$orderDetails[1]}}" readonly >
            </div>

            <div class="form-inline">
                <label for="numberOfItems">Number of Items Ordered</label>
                <input type="number" class="form-control" id="numberOfItems" name="numberOfItems" value="{{$numberOfItems}}" readonly >
            </div>

            <br>

            <?php
            $j =1;
            for($i =1; $i < $numberOfItems*3+1; $i += 3  ){?>
            <div class="form-inline">
                <div class="form-group">
                    <label for="orderItem{{$i}}">Order Item {{$j}}</label>
                    <input type="text" class="form-control" id="orderItem{{$j}}" name="orderItem{{$i}}" value="{{$orderDetails[$i+1]}}" readonly>
                </div>
                <div class="form-group">
                    <label for="quantity{{$i}}">Quantity</label>
                    <div class="input-group">
                        <input type="number" class="form-control" id="quantity{{$i}}" name="quantity{{$i}}" value="{{$orderDetails[$i+2]}}" readonly>
                        <div class="input-group-addon">kg</div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="unitPrice{{$i}}">Unit Price</label>
                    <div class="input-group">
                        <div class="input-group-addon">Rs</div>
                        <input type="number" class="form-control" id="unitPrice{{$i}}" name="unitPrice{{$i}}" value="{{$orderDetails[$i+3]}}" readonly>
                    </div>
                </div>


            </div>

            <br>
            <?php $j +=1; }
            ?>
            <br><br>
            <div class="form-inline">
                <label for="totalPrice">Total Price</label>
                <input type="number" class="form-control" id="totalPrice" name="totalPrice" value="{{$orderDetails[sizeof($orderDetails)-1]}}" readonly>
            </div>

            <br>
            <br>

            <h4><strong>Transaction Settlement method</strong></h4>
            <table class="table">
                <tr>
                    <td>
                        <input onclick="document.getElementById('cash').disabled = false; document.getElementById('cheque1').disabled = true;
                        document.getElementById('cheque2').disabled = true;
                        document.getElementById('cheque3').disabled = true;
                        document.getElementById('cheque4').disabled = true;
                        document.getElementById('cheque5').disabled = true;
                        document.getElementById('chequeRadio').checked = false;
                        document.getElementById('bothRadio').checked = false
                        document.getElementById('addCheque2').disabled = true;;" type="radio" name="cashRadio" id="cashRadio">
                        <label for="cheques">By Cash</label>
                    </td>
                    <td>
                        <input onclick="document.getElementById('cash').disabled = true; document.getElementById('cheque1').disabled = false;
                        document.getElementById('cheque2').disabled = false;
                        document.getElementById('cheque3').disabled = false;
                        document.getElementById('cheque4').disabled = false;
                        document.getElementById('cheque5').disabled = false;
                        document.getElementById('cashRadio').checked = false;
                        document.getElementById('bothRadio').checked = false;
                        document.getElementById('addCheque2').disabled = false;" type="radio" name="chequeRadio" id="chequeRadio">
                        <label for="cheques">By Cheques</label>
                    </td>
                    <td>
                        <input onclick="document.getElementById('cash').disabled = false; document.getElementById('cheque1').disabled = false;
                        document.getElementById('cheque2').disabled = false;
                        document.getElementById('cheque3').disabled = false;
                        document.getElementById('cheque4').disabled = false;
                        document.getElementById('cheque5').disabled = false;
                        document.getElementById('chequeRadio').checked = false;
                        document.getElementById('cashRadio').checked = false;
                        document.getElementById('addCheque2').disabled = false;
                        " type="radio" name="bothRadio" id="bothRadio">
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
                <h5><label for="cheque1">Cheque 1</label></h5><br>
                <div class="form-group" >
                    <label for="amount">Amount</label>
                    <div class="input-group">
                        <div class="input-group-addon">Rs</div>
                        <input type="number" class="form-control" id="cheque1" disabled="disabled" name="chequeAmount1">
                    </div>
                </div>

                <div class="form-group" >
                    <label for="chequeNo">Cheque No</label>
                    <input type="number" class="form-control" id="cheque2" disabled="disabled" name="chequeNo1">
                </div>
                <br><br>
                <div class="form-group">
                    <label for="bank">Bank</label>
                    <input type="text" class="form-control" id="cheque3" disabled="disabled" name="bank1">
                </div>
                <div class="form-group">
                    <label for="branch">Branch</label>
                    <input type="text" class="form-control" id="cheque4" disabled="disabled" name="branch1">
                </div>
                <br><br>
                <div class="form-group">
                    <label for="dueDate">Due date</label>
                    <input type="date" class="form-control" id="cheque5" disabled="disabled" name="dueDate1">
                </div>
                <button type="submit" class="btn btn-primary" id="addCheque2" onclick="document.getElementById('addChequeForm2').style.display='';
                document.getElementById('addCheque2').style.display='none'; return false" disabled="disabled">Add Cheque</button>
            </div>



            <div class="form-inline" id="addChequeForm2" style="display:none" >
                <hr>
                <h5><label for="cheque2">Cheque 2</label></h5><br>
                <div class="form-group" >
                    <label for="amount">Amount</label>
                    <div class="input-group">
                        <div class="input-group-addon">Rs</div>
                        <input type="number" class="form-control" id="cheque1" name="chequeAmount2">
                    </div>
                </div>

                <div class="form-group" >
                    <label for="chequeNo">Cheque No</label>
                    <input type="number" class="form-control" id="cheque2" name="chequeNo2">
                </div>
                <br><br>
                <div class="form-group">
                    <label for="bank">Bank</label>
                    <input type="text" class="form-control" id="cheque3" name="bank2">
                </div>
                <div class="form-group">
                    <label for="branch">Branch</label>
                    <input type="text" class="form-control" id="cheque4" name="branch2">
                </div>
                <br><br>
                <div class="form-group">
                    <label for="dueDate">Due date</label>
                    <input type="date" class="form-control" id="cheque5" name="dueDate2">
                </div>
                <button type="submit" class="btn btn-primary" id="addCheque3" onclick="document.getElementById('addChequeForm3').style.display='';
                document.getElementById('addCheque3').style.display='none'; return false">Add Cheque</button>
            </div>



            <div class="form-inline" id="addChequeForm3" style="display:none" >
                <hr>
                <h5><label for="cheque3">Cheque 3</label></h5><br>
                <div class="form-group" >
                    <label for="amount">Amount</label>
                    <div class="input-group">
                        <div class="input-group-addon">Rs</div>
                        <input type="number" class="form-control" id="cheque1" name="chequeAmount3">
                    </div>
                </div>

                <div class="form-group" >
                    <label for="chequeNo">Cheque No</label>
                    <input type="number" class="form-control" id="cheque2" name="chequeNo3">
                </div>
                <br><br>
                <div class="form-group">
                    <label for="bank">Bank</label>
                    <input type="text" class="form-control" id="cheque3" name="bank3">
                </div>
                <div class="form-group">
                    <label for="branch">Branch</label>
                    <input type="text" class="form-control" id="cheque4" name="branch3">
                </div>
                <br><br>
                <div class="form-group">
                    <label for="dueDate">Due date</label>
                    <input type="date" class="form-control" id="cheque5" name="dueDate3">
                </div>
                <button type="submit" class="btn btn-primary" id="addCheque4" onclick="document.getElementById('addChequeForm4').style.display='';
                document.getElementById('addCheque4').style.display='none'; return false">Add Cheque</button>
            </div>




            <div class="form-inline" id="addChequeForm4" style="display:none" >
                <hr>
                <h5><label for="cheque4">Cheque 4</label></h5><br>
                <div class="form-group" >
                    <label for="amount">Amount</label>
                    <div class="input-group">
                        <div class="input-group-addon">Rs</div>
                        <input type="number" class="form-control" id="cheque1" name="chequeAmount4">
                    </div>
                </div>

                <div class="form-group" >
                    <label for="chequeNo">Cheque No</label>
                    <input type="number" class="form-control" id="cheque2" name="chequeNo4">
                </div>
                <br><br>
                <div class="form-group">
                    <label for="bank">Bank</label>
                    <input type="text" class="form-control" id="cheque3" name="bank4">
                </div>
                <div class="form-group">
                    <label for="branch">Branch</label>
                    <input type="text" class="form-control" id="cheque4" name="branch4">
                </div>
                <br><br>
                <div class="form-group">
                    <label for="dueDate">Due date</label>
                    <input type="date" class="form-control" id="cheque5" disabled="disabled" name="dueDate4">
                </div>
                <button type="submit" class="btn btn-primary" id="addCheque5" onclick="document.getElementById('addChequeForm5').style.display='';
                document.getElementById('addCheque5').style.display='none'; return false">Add Cheque</button>
            </div>



            <div class="form-inline" id="addChequeForm5" style="display:none" >
                <hr>
                <h5><label for="cheque5">Cheque 5</label></h5><br>
                <div class="form-group" >
                    <label for="amount">Amount</label>
                    <div class="input-group">
                        <div class="input-group-addon">Rs</div>
                        <input type="number" class="form-control" id="cheque1" name="chequeAmount5">
                    </div>
                </div>

                <div class="form-group" >
                    <label for="chequeNo">Cheque No</label>
                    <input type="number" class="form-control" id="cheque2" name="chequeNo5">
                </div>
                <br><br>
                <div class="form-group">
                    <label for="bank">Bank</label>
                    <input type="text" class="form-control" id="cheque3" name="bank5">
                </div>
                <div class="form-group">
                    <label for="branch">Branch</label>
                    <input type="text" class="form-control" id="cheque4" name="branch5">
                </div>
                <br><br>
                <div class="form-group">
                    <label for="dueDate">Due date</label>
                    <input type="date" class="form-control" id="cheque5" name="dueDate5">
                </div>
                <button type="submit" class="btn btn-primary" id="addCheque6" onclick="document.getElementById('addChequeForm6').style.display='';
                document.getElementById('addCheque6').style.display='none'; return false">Add Cheque</button>
            </div>



            <div class="form-inline" id="addChequeForm6" style="display:none" >
                <hr>
                <h5><label for="cheque6">Cheque 6</label></h5><br>
                <div class="form-group" >
                    <label for="amount">Amount</label>
                    <div class="input-group">
                        <div class="input-group-addon">Rs</div>
                        <input type="number" class="form-control" id="cheque1" name="chequeAmount6">
                    </div>
                </div>

                <div class="form-group" >
                    <label for="chequeNo">Cheque No</label>
                    <input type="number" class="form-control" id="cheque2" name="chequeNo6">
                </div>
                <br><br>
                <div class="form-group">
                    <label for="bank">Bank</label>
                    <input type="text" class="form-control" id="cheque3" name="bank6">
                </div>
                <div class="form-group">
                    <label for="branch">Branch</label>
                    <input type="text" class="form-control" id="cheque4" name="branch6">
                </div>
                <br><br>
                <div class="form-group">
                    <label for="dueDate">Due date</label>
                    <input type="date" class="form-control" id="cheque5" name="dueDate6">
                </div>
            </div>

            <br><br>
            <h4><strong>Settled Status of the order</strong></h4>
            <table class="table">
                <tr>
                    <td>
                        <label for="settle">
                            <input onclick= "document.getElementById('notSettleRadio').checked = false;" type="radio" name="settleRadio" id="settleRadio">
                            Settled</label>
                    </td>
                    <td>
                        <label for="notSettle">
                            <input onclick= "document.getElementById('settleRadio').checked = false;" type="radio" name="notSettleRadio" id="settleRadio">
                            Not settled</label>
                    </td>
                </tr>
            </table>

            <br><br>
            <button type="submit" class="btn btn-primary">Create Reciept</button>
            <input  type="hidden" name="_token" value="{{Session::token()}}">
            <br><br>

        </form>
    </div>

@endsection
