@extends('Layouts.master')
@section('content')
    <style>

    </style>

    <h2>Purchase Paddy</h2>
    <br>

    <div class="col-md-7 col-md-offset-1">
        @if($wrong!=null)
            <div class="alert alert-warning" role="alert">
                {{$wrong}}
            </div>
        @endif
        <form action="{{route("createPaddyPurchaseInvoice")}}" method="post">

            <div class="form-group">
                <label for="supplierName">Supplier Name</label>
                <div class="input-group">
                    <input type="text" class="form-control" id="supplierName" placeholder="Supplier Name"
                           name="supplierName" required>
                    <div class="input-group-btn">
                        <a href="{{route('Supplier')}}"  class="btn btn-default btn-flat" >
                            <span class="glyphicon glyphicon-plus"></span>
                        </a>
                        </div>
                </div>
            </div>

            <div class="form-group">
                <label for="date">Date</label>
                <input type="date" class="form-control" id="date" placeholder="Date" name="date" required>
            </div>
            <div class="form-group">
                <label for="puchaseItem">Purchase Item</label>
                <select name="purchaseItem" id="purchaseItem" class="form-control" required>
                    <option>Samba</option>
                    <option>Nadu</option>
                    <option>Red Samba</option>
                    <option>Red Nadu</option>
                    <option>Kiri Samba</option>
                    <option>Suvandal</option>
                </select>
            </div>
            <br>
            <div class="form-inline">
                <div class="form-group">
                    <label for="quantity">Quantity</label>
                    <div class="input-group">
                        <input type="number" class="form-control" id="quantity" placeholder="Quantity"
                               name="quantity" required min="0">
                        <div class="input-group-addon">kg</div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="unitPrice">Unit Price</label>
                    <div class="input-group">
                        <div class="input-group-addon">Rs</div>
                        <input type="number" class="form-control" id="unitPrice" placeholder="Unit price"
                               name="unitPrice" required min="0">
                    </div>
                </div>
                <br><br>
            </div>

            <br>
            <br>

            <br><br>
            <button type="submit" class="btn btn-primary">Next</button>
            <input  type="hidden" name="_token" value="{{Session::token()}}">
            <br><br>

        </form>
    </div>

@endsection
