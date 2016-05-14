@extends('Layouts.master')
@section('content')
    <style>

    </style>

    <h2>Purchase Rice</h2>
    <br>
    <div class="col-md-7 col-md-offset-1">
        <div class="alert alert-success" role="alert">Well done! Your Rice Puchase was created successfully</div>
        <form action="{{route("createRicePurchase")}}" method="post">

            <div class="form-group">
                <label for="supplierName">Supplier Name</label>
                <div class="input-group">
                    <input type="text" class="form-control" id="customeName" placeholder="Customer Name" name="customerName">
                    <div class="input-group-btn">
                        <a href="{{route('Supplier')}}"  class="btn btn-default btn-flat" >
                            <span class="glyphicon glyphicon-plus"></span>
                        </a>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="date">Date</label>
                <input type="date" class="form-control" id="date" placeholder="Date" name="date">
            </div>
            <div class="form-group">
                <label for="puchaseItem">Purchase Item</label>
                <select name="purchaseItem" id="purchaseItem" class="form-control">
                    <option>Samba</option>
                    <option>Nadu</option>
                    <option>Red Samba</option>
                    <option>Red Nadu</option>
                    <option>Kiri Samba</option>
                    <option>Suwandel</option>
                </select>
            </div>
            <br>
            <div class="form-inline">
                <div class="form-group">
                    <label for="quantity">Quantity</label>
                    <div class="input-group">
                        <input type="number" class="form-control" id="quantity" placeholder="Quantity" name="quantity">
                        <div class="input-group-addon">kg</div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="unitPrice">Unit Price</label>
                    <div class="input-group">
                        <div class="input-group-addon">Rs</div>
                        <input type="number" class="form-control" id="unitPrice" placeholder="Unit price" name="unitPrice">
                    </div>
                </div>
            </div>

            <br>
            <br>

            <h4><strong>Transaction Settlement method</strong></h4>
            <hr>
            <div class="form-inline">
                <input onclick="document.getElementById('cash').disabled = false; document.getElementById('cheque1').disabled = true;
                document.getElementById('cheque2').disabled = true;
                document.getElementById('cheque3').disabled = true;
                document.getElementById('cheque4').disabled = true;
                document.getElementById('cheque5').disabled = true;
                document.getElementById('chequeRadio').checked = false;
                document.getElementById('bothRadio').checked = false;" type="radio" name="cashRadio" id="cashRadio">
                <label for="cheques">By Cash</label>
                <input onclick="document.getElementById('cash').disabled = true; document.getElementById('cheque1').disabled = false;
                document.getElementById('cheque2').disabled = false;
                document.getElementById('cheque3').disabled = false;
                document.getElementById('cheque4').disabled = false;
                document.getElementById('cheque5').disabled = false;
                document.getElementById('cashRadio').checked = false;
                document.getElementById('bothRadio').checked = false;" type="radio" name="chequeRadio" id="chequeRadio">
                <label for="cheques">By Cheques</label>
                <input onclick="document.getElementById('cash').disabled = false; document.getElementById('cheque1').disabled = false;
                document.getElementById('cheque2').disabled = false;
                document.getElementById('cheque3').disabled = false;
                document.getElementById('cheque4').disabled = false;
                document.getElementById('cheque5').disabled = false;
                document.getElementById('chequeRadio').checked = false;
                document.getElementById('cashRadio').checked = false;" type="radio" name="bothRadio" id="bothRadio">
                <label for="cheques">By Cash and Cheques</label>
            </div>
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
            <button type="submit" class="btn btn-primary">Create Invoice</button>
            <input type="hidden" name="_token" value="{{Session::token()}}">
            <br><br>

        </form>
    </div>

@endsection
