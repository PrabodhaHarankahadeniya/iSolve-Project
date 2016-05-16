@extends('Layouts.master')
@section('style')
    <style>
        h1 {

            text-align: center;
            font-family: Times;
        }

    </style>

@endsection
@section('content')

    <section class="row new-post">


        <div class="row">
            <br>
            <h1 align="center">Add/Edit Employee</h1>
            <br>
            <table class="table table-bordered" style="width: 70%" align="center">
                <thead>
                <tr>
                    <th align="center">Employee Name</th>
                    <th align="center">Telephone Number</th>
                    <th align="center">NIC Number</th>
                    <th align="center">Gender</th>
                    <th align="center">Address</th>
                    <th align="center">Designation</th>
                </tr>
                </thead>
                <tbody>

                @foreach($employees as $employee)
                    <div>
                        <tr>
                            <td width="30%">{{$employee->name}}</td>
                            <td width="15%">{{$employee->teleNo}}</td>
                            <td width="10%">{{$employee->nicNo}}</td>
                            <td width="10%">{{$employee->gender}}</td>
                            <td width="30%">{{$employee->address}}</td>
                            <td width="10%">{{$employee->post}}</td>

                        </tr>
                    </div>
                @endforeach
                </tbody>
            </table>
            <br><br>
            <h3>Employee Form</h3><br>
            <form action="{{route('addEditEmployee')}}" class="form-horizontal" role="form" method="post">

                <div class="form-group {{$errors->has('name') ? 'has-error':''}}">
                    <label class="control-label col-sm-2" for="Employee name">Employee Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="name" id="name" placeholder="Enter name"
                               value="{{Request::old('name')}}">
                    </div>
                </div>
                <div class="form-group {{$errors->has('telNo') ? 'has-error':''}}">
                    <label class="control-label col-sm-2" for="telNo">Telephone Number</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="telNo" id="telNo"
                               placeholder="Enter Telephone Number" value="{{Request::old('telNo')}}">
                    </div>
                </div>
                <div class="form-group {{$errors->has('nicNo') ? 'has-error':''}}">
                    <label class="control-label col-sm-2" for="nicNo">NIC No</label>
                    <div class="col-sm-10">
                        <input type="tel" class="form-control" name="nicNo" id="nicNo" placeholder="Enter NIC Number"
                               value="{{Request::old('nicNo')}}">
                    </div>
                </div>

                <div class="form-group {{$errors->has('gender') ? 'has-error':''}}">
                    <label class="control-label col-sm-2" for="gender">Gender</label>
                    <div class="col-sm-10">
                        <select class="form-control" name="gender" id="gender">
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </div>
                </div>
                <div class="form-group {{$errors->has('address') ? 'has-error':''}}">
                    <label class="control-label col-sm-2" for="address">Address</label>
                    <div class="col-sm-10">
                        <input type="tel" class="form-control" name="address" id="address" placeholder="Enter Address"
                               value="{{Request::old('address')}}">
                    </div>
                </div>

                <div class="form-group {{$errors->has('post') ? 'has-error':''}}">
                    <label class="control-label col-sm-2" for="post">Post</label>
                    <div class="col-sm-10">
                        <input type="tel" class="form-control" name="post" id="post"
                               placeholder="Enter Post" value="{{Request::old('post')}}">
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