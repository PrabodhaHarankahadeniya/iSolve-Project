@extends('Layouts.master')
@section('content')
    <style>

    </style>

    <h2>Make Flour Order</h2>
    <br>
    <div class="col-md-7 col-md-offset-1">
        <form action="{{route("createFlourOrder")}}" method="post">

            <div class="form-group">
                <label for="customerName">Customer Name</label>
                <div class="input-group">
                    <input type="text" class="form-control" id="customerName" placeholder="Customer Name" name="customerName">
                    <div class="input-group-btn">
                        <a href="{{route('Customer')}}"  class="btn btn-default btn-flat" >
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
                <label for="orderItem">Order Item</label>
                <select name="orderItem" id="orderItem" class="form-control" >
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
                <br><br>
            </div>

            <br>
            <br>

            <br><br>
            <button type="submit" class="btn btn-primary">Create Order</button>
            <input  type="hidden" name="_token" value="{{Session::token()}}">
            <br><br>

        </form>
    </div>

@endsection
