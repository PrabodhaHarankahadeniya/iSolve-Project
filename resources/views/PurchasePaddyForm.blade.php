@extends('layouts.master')
@section('content')

    <h2>Purchase Paddy</h2>
    <br>
    <div class="col-md-7 col-md-offset-1">
        <form>

            <div class="form-group">
                <label for="supplierName">Supplier Name</label>
                <div class="input-group">
                    <input type="text" class="form-control" id="exampleInputAmount" placeholder="Quantity">
                    <div class="input-group-addon"><span class="halflings halflings-plus"></span></div>
                </div>
            </div>

            <div class="form-group">
                <label for="date">Date</label>
                <input type="string" class="form-control" id="exampleInputPassword1" placeholder="Password">
            </div>
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
            <button type="submit" class="btn btn-primary">Create Invoice</button>
        </form>
    </div>

@endsection
