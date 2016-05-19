@extends('Layouts.master')
@section('content')
    <style>

    </style>

    <h2>Make Flour Order</h2>
    <br>
    @if($wrong!=null)
        <div class="alert alert-warning" role="alert">
            {{$wrong}}
        </div>
    @endif
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
            </div >
            <hr>
            <div class="form-group">
                <label for="orderItem1">Order Item 1</label>
                <select name="orderItem1" id="orderItem1" class="form-control" >
                    <option>White Rice Flour</option>
                    <option>Red Kekulu Flour</option>
                </select>
            </div>
            <br>
            <div class="form-inline">
                <div class="form-group">
                    <label for="quantity1">Quantity</label>
                    <div class="input-group">
                        <input type="number" class="form-control" id="quantity1" placeholder="Quantity" name="quantity1">
                        <div class="input-group-addon">kg</div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="unitPrice1">Unit Price</label>
                    <div class="input-group">
                        <div class="input-group-addon">Rs</div>
                        <input type="number" class="form-control" id="unitPrice1" placeholder="Unit price" name="unitPrice1">
                    </div>
                </div>
                <br><br>
            </div>
            <br>
            <button type="submit" class="btn btn-primary" id="addItem2" onclick="document.getElementById('addItemForm2').style.display='';
                document.getElementById('addItem2').style.display='none'; return false">Add Item</button>
            <br><br>
            <div id="addItemForm2" style="display:none">
                <hr>
                <div class="form-group">
                    <label for="orderItem2">Order Item 2</label>
                    <select name="orderItem2" id="orderItem2" class="form-control" >
                        <option>White Rice Flour</option>
                        <option>Red Kekulu Flour</option>
                    </select>
                </div>
                <br>
                <div class="form-inline">
                    <div class="form-group">
                        <label for="quantity2">Quantity</label>
                        <div class="input-group">
                            <input type="number" class="form-control" id="quantity2" placeholder="Quantity" name="quantity2">
                            <div class="input-group-addon">kg</div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="unitPrice2">Unit Price</label>
                        <div class="input-group">
                            <div class="input-group-addon">Rs</div>
                            <input type="number" class="form-control" id="unitPrice2" placeholder="Unit price" name="unitPrice2">
                        </div>
                    </div>
                    <br><br>
                </div>
                <br>
            </div>


            <br>
            <button type="submit" class="btn btn-primary">Create Order</button>
            <input  type="hidden" name="_token" value="{{Session::token()}}">

        </form>
        <br><br>

        <br><br>

    </div>

@endsection
