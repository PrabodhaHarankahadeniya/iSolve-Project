@extends('Layouts.master')

@section('style')
    <style>
        h1 {
            text-align: center;
            font-family: Times;

        }

        input {

        }


    </style>

@endsection

@section('content')

    <section class="row new-post">

        <div class="container-fluid">

            <div class="page-header">
                <h1 align="center">Employee Search Results</h1>
            </div>

            <nav class="navbar">
                <form action="{{route('searchForEmployee')}}" method="post" >
                    <div class="form-group container" align="center">
                        <div class="row">
                            <div class="col-sm-4" align="center">
                                <input type="text" class="form-control" name="name" id="name" placeholder="Search for Employee"
                                       class="form-horizontal" role="form" value="{{Request::old('name')}}"required>

                            </div>
                            <div class="col-sm-8"  align="center">
                                <button type="submit" class="btn btn-primary">Search</button>
                                <input type="hidden" name="_token" value="{{Session::token()}}">
                            </div>
                        </div>
                    </div>


                </form>
            </nav>
            @if($employees!=null)
            {{--<table class="table table-bordered" style="width: 70%" align="center">--}}
                {{--<thead>--}}
                {{--<tr>--}}
                    {{--<th align="center">Employee id</th>--}}
                    {{--<th align="center">Employee Name</th>--}}
                    {{--<th align="center">Telephone Number</th>--}}
                    {{--<th align="center">NIC Number</th>--}}
                    {{--<th align="center">Gender</th>--}}
                    {{--<th align="center">Address</th>--}}
                    {{--<th align="center">Designation</th>--}}
                    {{--<th align="center">Status</th>--}}

                {{--</tr>--}}
                {{--</thead>--}}
                {{--<tbody>--}}
                {{--<form action="{{route('linkSearchEmployee')}}" method="get">--}}
                    {{--@foreach($employees as $employee)--}}
                        {{--<div>--}}
                            {{--<tr>--}}
                                {{--<td width="10%"><input type="text" class="form-control" name="id" id="id"--}}
                                                       {{--value="{{$employee->id}}" readonly></td>--}}
                                {{--<td width="20%"><input type="text" class="form-control" name="name" id="name"--}}
                                                       {{--value="{{$employee->name}}" readonly></td>--}}
                                {{--<td width="15%"><input type="text" class="form-control" name="teleNo"--}}
                                                       {{--id="teleNo"--}}
                                                       {{--value="{{$employee->teleNo}}" readonly></td>--}}
                                {{--<td width="10%"><input type="text" class="form-control" name="nicNo" id="nicNo"--}}
                                                       {{--value="{{$employee->nicNo}}" readonly></td>--}}
                                {{--<td width="10%"><input type="text" class="form-control" name="gender"--}}
                                                       {{--id="gender"--}}
                                                       {{--value="{{$employee->gender}}" readonly></td>--}}
                                {{--<td width="30%"><input type="text" class="form-control" name="address"--}}
                                                       {{--id="address"--}}
                                                       {{--value="{{$employee->address}}" readonly></td>--}}
                                {{--<td width="10%"><input type="text" class="form-control" name="post" id="post"--}}
                                                       {{--value="{{$employee->post}}" readonly></td>--}}
                                {{--<td width="15%"><input type="text" class="form-control" name="status" id="status"--}}
                                                       {{--value="{{$employee->status}}" readonly></td>--}}


                            {{--</tr>--}}

                        {{--</div>--}}
                    {{--@endforeach--}}
                    {{--<tr>--}}
                        {{--<td colspan="11">--}}
                            {{--<button type="submit" class="btn btn-primary">Back</button>--}}
                            {{--<input type="hidden" name="_token" value="{{Session::token()}}">--}}
                        {{--</td>--}}
                    {{--</tr>--}}
                {{--</form>--}}
                {{--</tbody>--}}
            {{--</table>--}}



            @foreach($employees as $employee)
                <form action="{{route('linkSearchEmployee')}}" class="form-horizontal" role="form">
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="Employee id">Employee ID</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="id" id="id"
                                   value="{{$employee->id}}" readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="Employee name">Employee Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="name" id="name"
                                   value="{{$employee->name}}" readonly>
                        </div>
                    </div>
                    <div class="form-group {{$errors->has('telNo') ? 'has-error':''}}">
                        <label class="control-label col-sm-2" for="telNo">Telephone Number</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="teleNo"
                                   id="teleNo"
                                   value="{{$employee->teleNo}}" readonly>
                        </div>
                    </div>
                    <div class="form-group {{$errors->has('nicNo') ? 'has-error':''}}">
                        <label class="control-label col-sm-2" for="nicNo">NIC No</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="nicNo" id="nicNo"
                                   value="{{$employee->nicNo}}" readonly>
                        </div>
                    </div>

                    <div class="form-group">
                        <?php

                        if($employee->gender==0)
                            $gender="Male";
                        else
                            $gender="Female";

                        ?>
                        <label class="control-label col-sm-2" for="gender">Gender</label>
                        <div class="col-sm-10">

                            <input type="text" class="form-control" name="gender"
                                   id="gender"
                                   value="{{$gender}}" readonly>

                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="address">Address</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="address"
                                   id="address"
                                   value="{{$employee->address}}" readonly>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2" for="post">Post</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="post" id="post"
                                   value="{{$employee->post}}" readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="post">Status</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="status" id="status"
                                   value="{{$employee->status}}" readonly>
                        </div>
                    </div>
                @endforeach
                    <div class="form-group">
                    <div class="col-sm-10 col-sm-offset-2">
                        <br>
                        <button type="submit" class="btn btn-primary">Back</button>
                        <input type="hidden" name="_token" value="{{Session::token()}}">
                    </div>
                    </div>
                </form>
    <br><br><br>
            @else

            <h4 align="center">No Results found</h4>
            @endif
        </div>

    </section>
@endsection