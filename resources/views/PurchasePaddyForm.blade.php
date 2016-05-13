@extends('layouts.master')
@section('content')
    <style>

    </style>

    <h2>Purchase Paddy</h2>
    <br>
    <div class="col-md-7 col-md-offset-1">
        <form>

            <div class="form-group">
                <label for="supplierName">Supplier Name</label>
                <div class="input-group">
                    <input type="text" class="form-control" id="supplierName" placeholder="Supplier Name">
                    <div class="input-group-addon"></div>
                </div>
            </div>

            <div class="form-group">
                <label for="date">Date</label>
                <input type="string" class="form-control" id="exampleInputPassword1" placeholder="Password">
            </div>
            <div class="form-group">
                <label for="date">Purchase Item</label>
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
                        <input type="text" class="form-control" id="exampleInputAmount" placeholder="Quantity">
                        <div class="input-group-addon">kg</div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail2">Unit Price</label>
                    <div class="input-group">
                        <div class="input-group-addon">Rs</div>
                        <input type="text" class="form-control" id="exampleInputAmount" placeholder="Unit price">
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
                document.getElementById('cheque5').disabled = true;" type="radio" name="type">
                <label for="cheques">By Cash</label>
                <input onclick="document.getElementById('cash').disabled = true; document.getElementById('cheque1').disabled = false;
                document.getElementById('cheque2').disabled = false;
                document.getElementById('cheque3').disabled = false;
                document.getElementById('cheque4').disabled = false;
                document.getElementById('cheque5').disabled = false;" type="radio" name="type">
                <label for="cheques">By Cheques</label>
                <input onclick="document.getElementById('cash').disabled = false; document.getElementById('cheque1').disabled = false;
                document.getElementById('cheque2').disabled = false;
                document.getElementById('cheque3').disabled = false;
                document.getElementById('cheque4').disabled = false;
                document.getElementById('cheque5').disabled = false;" type="radio" name="type">
                <label for="cheques">By Cash and Cheques</label>
            </div>
            <br><br>
            <h4><strong>Paid by Cash</strong></h4>
            <hr>
            <div class="form-inline">
                <label for="date">Amount</label>
                <div class="input-group">
                    <div class="input-group-addon">Rs</div>
                    <input type="text" class="form-control" id ="cash" disabled="disabled" placeholder="Unit price">
                </div>
            </div>
            <br><br>
            <h4><strong>Paid by Cheques</strong></h4>
            <hr>
            <div class="form-inline" >
                <div class="form-group" >
                    <label for="date">Amount</label>
                    <div class="input-group">
                        <div class="input-group-addon">Rs</div>
                        <input type="text" class="form-control" id="cheque1" disabled="disabled">
                    </div>
                </div>

                <div class="form-group" >
                    <label for="date">Cheque No</label>
                    <input type="string" class="form-control" id="cheque2" disabled="disabled">
                </div>
                <br><br>
                <div class="form-group">
                    <label for="date">Bank</label>
                    <input type="string" class="form-control" id="cheque3" disabled="disabled">
                </div>
                <div class="form-group">
                    <label for="date">Branch</label>
                    <input type="string" class="form-control" id="cheque4" disabled="disabled">
                </div>
                <br><br>
                <div class="form-group">
                    <label for="date">Due date</label>
                    <input type="string" class="form-control" id="cheque5" disabled="disabled">
                </div>
            </div>

            <br><br>
            <button type="submit" class="btn btn-primary">Create Invoice</button>
            <br><br>
        </form>
    </div>

@endsection
