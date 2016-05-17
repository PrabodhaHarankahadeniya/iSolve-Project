@extends('Layouts.master')
@section('style')
    <style>
        h1{

            text-align: center;
            font-family: Times;
        }

    </style>
@section('content')

    <section class="row new-post">

            <br>
            <h1 align="center">Suppliers </h1>

            <br>
            <table class="table table-bordered" style="width: 60%" align="center" >

                <thead>
                <tr>
                    <th>Name</th>
                    <th>Telephone No</th>
                </tr>
                </thead>
                <tbody>

                @foreach($suppliers as $temp)

                    <div>
                        <tr>
                            <td width="40%">{{$temp->name}}</td>
                            <td width="20%">{{$temp->tele_no}}</td>
                        </tr>

                    </div>
                @endforeach
                </tbody>
            </table>
<br><br>
    </section>
    <section>
        <form action="{{route('addSupplier')}}" class="form-horizontal" role="form" method="post">
            <h3>New Supplier form</h3><br>
            <div class="form-group">
                <label class="control-label col-sm-2" for="name">Name :</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="name" id="name" placeholder="Enter name">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="teleNo">Telephone No :</label>
                <div class="col-sm-10">
                    <input type="tel" class="form-control" name="teleNo"  id="teleNo" placeholder="Enter telephone No.">
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