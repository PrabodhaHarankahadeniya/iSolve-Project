@extends('Layouts.master')
@section('content')
    <style>

    </style>

    <h2>Purchase Rice</h2>
    <br>
    @if(count($errors)>0)
        @foreach($errors->all() as $error)
            <div class="alert alert-danger" role="alert">{{$error}}</div>
            <br>
        @endforeach
    @endif
    @if($wrong!=null)
        <div class="alert alert-warning" role="alert">
            {{$wrong}}
        </div>
    @endif
    <div class="col-md-7 col-md-offset-1">


        <form action="{{route("createRicePurchaseInvoice")}}" method="post">

            <div class="form-group">
                <label for="supplierName">Supplier Name</label>
                <div class="input-group">
                    <input type="text" class="form-control" id="supplierName" placeholder="Supplier Name" name="supplierName" required>
                    <div class="input-group-btn">
                        <a href="{{route('Supplier')}}"  class="btn btn-default btn-flat" >
                            <span class="glyphicon glyphicon-plus"></span>
                        </a>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="date">Date</label>
                <input type="date" class="form-control" id="date" placeholder="Date" name="date" max="{{date("Y-m-d")}}" required>
            </div>
            <div class="form-group">
                <label for="puchaseItem">Purchase Item</label>
                <select name="purchaseItem" id="purchaseItem" class="form-control">
                    <option>Samba</option>
                    <option>Nadu</option>
                    <option>Red Samba</option>
                    <option>Red Nadu</option>
                    <option>Kiri Samba</option>
                    <option>Suvandal</option>
                    <option>Kekulu Samba</option>
                    <option>Sudu Kekulu</option>
                    <option>Kekulu</option>
                    <option>Red Kekulu</option>
                    <option>Kekulu Kiri</option>

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
