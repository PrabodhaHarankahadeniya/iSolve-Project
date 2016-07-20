@extends('Layouts.master')
@section('style')
    <style>
        h1{
            text-align: center;
            font-family: Times;

        }
        .watermark {
            opacity: 0.3;
            color: BLACK;
            position: absolute;
            bottom: 0;
            right: 0;
        }

    </style>
@section('content')

    <section class="row new-post">

        <br>
        <h1 align="center">Customers</h1>
        <br>
        <table class="table table-bordered" style="width: 70%" align="center" >
            <thead>
            <tr>
                <th align="center">Name</th>
                <th align="center">NameofShop</th>
                <th align="center">TeleNo</th>
            </tr>
            </thead>
            <tbody>

            @foreach($customers as $temp)

                <div>
                    <tr>
                        <td width="30%">{{$temp->name}}</td>
                        <td width="30%">{{$temp->name_of_shop}}</td>
                        <td width="10%">{{$temp->tele_no}}</td>
                    </tr>

                </div>
            @endforeach
            </tbody>
        </table><br><br>
        <h3>New Customer Form</h3><br>
        <form action="{{route('linkCustomers')}}" class="form-horizontal" role="form" method="post">
            <div class="form-group">
                <label class="control-label col-sm-2" for="name">Name:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="name" id="name" placeholder="Enter name" required>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for=">nameOfShop">Name Of Shop:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="nameOfShop" id="nameOfShop" placeholder="Enter name of the shop" required>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="teleNo">Telephone No:</label>
                <div class="col-sm-10">
                    <input type="tel" class="form-control" name="teleNo" id="teleNo" placeholder="Enter telephone No" required>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-primary">submit</button>
                    <input type="hidden" name="_token" value="{{Session::token()}}">

                </div>
            </div>

        </form>

        <div >
            <img class="watermark" width="500px" src="src/img/customer.jpg"/>
        </div>
    </section>
@endsection