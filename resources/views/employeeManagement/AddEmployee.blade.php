@extends('Layouts.master')
@section('style')
    <style>
        h1 {

            text-align: center;
            font-family: Times;
        }
        input{
            border: none;

        }
    </style>

@endsection
@section('header')
    <?php $users = \App\User::all();?>
    @foreach($users as $user)

        @if($user->username=="admin" and $user->user_type=="currentUser")
            @include('includes.header')
        @elseif($user->username=="clerk" and $user->user_type=="currentUser")
            @include('includes.headerClerk')

        @endif
    @endforeach
@endsection
@section('content')

    <section class="row new-post">


        <div class="row">
            <div >
                <h1 align="center">Add/Edit Employee</h1>
                <br><br>
            </div>
            <table class="table table-bordered" style="width: 90%" align="center">
                <thead>
                <tr>
                    <th align="center">Employee id</th>
                    <th align="center">Employee Name</th>
                    <th align="center">Telephone Number</th>
                    <th align="center">NIC Number</th>
                    <th align="center">Gender</th>
                    <th align="center">Address</th>
                    <th align="center">Designation</th>
                    <th align="center">Edit</th>
                </tr>
                </thead>
                <tbody>

                @foreach($employees as $employee)


                    <?php

                    if($employee->gender==0)
                        $gender="Male";
                    else
                        $gender="Female";

                    ?>
                    <div>
                        <tr>
                            <form action="{{route('linkEditEmployee')}}" method="post">
                                <td width="10%"><input type="text" class="form-control" name="id" id="id"
                                                       value="{{$employee->id}}" readonly></td>
                                <td width="20%"><input type="text" class="form-control" name="name" id="name"
                                                       value="{{$employee->name}}" readonly></td>
                                <td width="15%"><input type="text" class="form-control" name="teleNo" id="teleNo"
                                                       value="{{$employee->teleNo}}" readonly></td>
                                {{--<td width="15%"><input type="text" class="form-control" name="teleNo"--}}
                                                       {{--id="teleNo"--}}
                                                       {{--value="{{$employee->teleNo}}" readonly></td>--}}
                                <td width="15%"><input type="text" class="form-control" name="nicNo" id="nicNo"
                                                       value="{{$employee->nicNo}}" readonly></td>
                                <td width="10%"><input type="text" class="form-control" name="gender"
                                                       id="gender"
                                                       value="{{$gender}}" readonly></td>
                                <td width="30%"><input type="text" class="form-control" name="address"
                                                       id="address"
                                                       value="{{$employee->address}}" readonly></td>
                                <td width="10%"><input type="text" class="form-control" name="post" id="post"
                                                       value="{{$employee->post}}" readonly></td>
                                <td>
                                    <button type="submit" class="btn btn-primary">Edit</button>
                                    <input type="hidden" name="_token" value="{{Session::token()}}">

                                </td>


                            </form>
                        </tr>
                    </div>
                @endforeach
                </tbody>
            </table>

            <hr>

                <h3>Employee Form</h3>
            <br><br>
            <form action="{{route('addEditEmployee')}}" class="form-horizontal" role="form" method="post">

                <div class="form-group">
                    <label class="control-label col-sm-2" for="Employee name">Employee Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="name" id="name"
                               placeholder="Enter name"
                               value="{{Request::old('name')}}" required>
                    </div>
                </div>
                <div class="form-group {{$errors->has('telNo') ? 'has-error':''}}">
                    <label class="control-label col-sm-2" for="telNo">Telephone Number</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="telNo" id="telNo"
                               placeholder="Enter Telephone Number"
                               value="{{Request::old('telNo')}}" required minlength="10" maxlength="10">
                    </div>
                </div>
                <div class="form-group {{$errors->has('nicNo') ? 'has-error':''}}">
                    <label class="control-label col-sm-2" for="nicNo">NIC No</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="nicNo" id="nicNo"
                               placeholder="Enter NIC Number"
                               value="{{Request::old('nicNo')}}" required minlength="10" maxlength="10">
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-sm-2" for="gender">Gender</label>
                    <div class="col-sm-10">

                        <select class="form-control" name="gender" id="gender" required>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>

                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="address">Address</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="address" id="address"
                               placeholder="Enter Address"
                               value="{{Request::old('address')}}" required>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-sm-2" for="post">Post</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="post" id="post"
                               placeholder="Enter Post" value="{{Request::old('post')}}" required>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-primary">submit</button>
                        <input type="hidden" name="_token" value="{{Session::token()}}">
                    </div>
                </div>
            </form>
            <br><br><br><br>
        </div>
    </section>
@endsection