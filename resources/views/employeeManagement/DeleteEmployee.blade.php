@extends('Layouts.master')
@section('style')
    <style>
        h1 {

            text-align: center;
            font-family: Times;
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

                <h1 align="center">Delete Employee</h1>
            <br><br>
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
                            <form action="{{route('deleteEmployee')}}" method="post">
                                <td width="10%"><input type="text" class="form-control" name="id" id="id"
                                                       value="{{$employee->id}}" readonly></td>
                                <td width="20%"><input type="text" class="form-control" name="name" id="name"
                                                       value="{{$employee->name}}" readonly></td>
                                <td width="15%"><input type="number" class="form-control" name="teleNo"
                                                       id="teleNo"
                                                       value="{{$employee->teleNo}}" readonly></td>
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
                                    <button type="submit" class="btn btn-primary">Delete</button>
                                    <input type="hidden" name="_token" value="{{Session::token()}}">

                                </td>

                            </form>
                        </tr>
                    </div>
                @endforeach
                </tbody>
            </table>
            <br><br><br><br>
        </div>
    </section>
@endsection