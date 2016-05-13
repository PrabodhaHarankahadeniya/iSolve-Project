@extends('Layouts.master')

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
                        <td width="30%">{{$temp->Name}}</td>
                        <td width="30%">{{$temp->NameofShop}}</td>
                        <td width="10%">{{$temp->TeleNo}}</td>
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
                    <input type="text" class="form-control" name="name" id="name" placeholder="Enter name">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for=">nameOfShop">Name Of Shop:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="nameOfShop" id="nameOfShop" placeholder="Enter name of the shop">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="teleNo">Telephone No:</label>
                <div class="col-sm-10">
                    <input type="tel" class="form-control" name="teleNo" id="teleNo" placeholder="Enter telephone No">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-primary">submit</button>
                    <input type="hidden" name="_token" value="{{Session::token()}}">

                </div>
            </div>

        </form>


    </section>
@endsection