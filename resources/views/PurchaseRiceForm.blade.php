@extends('layouts.master')
@section('content')
    <style>

    </style>

    <h2>Purchase Rice</h2>
    <br>
    <div class="col-md-7 col-md-offset-1">
        <form>

            <div class="form-group">
                <label for="supplierName">Supplier Name</label>
                <div class="input-group">
                    <input type="text" class="form-control" id="supplierName" placeholder="Supplier Name">
                    <div class="input-group-btn">
                        <a href="#"  class="btn btn-default btn-flat" >
                            <span class="glyphicon glyphicon-plus"></span>
                        </a>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="date">Date</label>
                <input type="date" class="form-control" id="date" placeholder="Date">
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
                        <input type="number" class="form-control" id="quantity" placeholder="Quantity">
                        <div class="input-group-addon">kg</div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="unitPrice">Unit Price</label>
                    <div class="input-group">
                        <div class="input-group-addon">Rs</div>
                        <input type="number" class="form-control" id="unitPrice" placeholder="Unit price">
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
                document.getElementById('cheque5').disabled = true;" type="radio" name="cashRadio">
                <label for="cheques">By Cash</label>
                <input onclick="document.getElementById('cash').disabled = true; document.getElementById('cheque1').disabled = false;
                document.getElementById('cheque2').disabled = false;
                document.getElementById('cheque3').disabled = false;
                document.getElementById('cheque4').disabled = false;
                document.getElementById('cheque5').disabled = false;" type="radio" name="chequeRadio">
                <label for="cheques">By Cheques</label>
                <input onclick="document.getElementById('cash').disabled = false; document.getElementById('cheque1').disabled = false;
                document.getElementById('cheque2').disabled = false;
                document.getElementById('cheque3').disabled = false;
                document.getElementById('cheque4').disabled = false;
                document.getElementById('cheque5').disabled = false;" type="radio" name="bothRadio">
                <label for="cheques">By Cash and Cheques</label>
            </div>
            <br><br>
            <h4><strong>Paid by Cash</strong></h4>
            <hr>
            <div class="form-inline">
                <label for="amount">Amount</label>
                <div class="input-group">
                    <div class="input-group-addon">Rs</div>
                    <input type="number" class="form-control" id ="cash" disabled="disabled" placeholder="amount">
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
                        <input type="number" class="form-control" id="cheque1" disabled="disabled">
                    </div>
                </div>

                <div class="form-group" >
                    <label for="chequeNo">Cheque No</label>
                    <input type="number" class="form-control" id="cheque2" disabled="disabled">
                </div>
                <br><br>
                <div class="form-group">
                    <label for="bank">Bank</label>
                    <input type="text" class="form-control" id="cheque3" disabled="disabled">
                </div>
                <div class="form-group">
                    <label for="branch">Branch</label>
                    <input type="text" class="form-control" id="cheque4" disabled="disabled">
                </div>
                <br><br>
                <div class="form-group">
                    <label for="dueDate">Due date</label>
                    <input type="date" class="form-control" id="cheque5" disabled="disabled">
                </div>
            </div>

            <br><br>
            <button type="submit" class="btn btn-primary">Create Invoice</button>
            <br><br>

        </form>
    </div>

@endsection
