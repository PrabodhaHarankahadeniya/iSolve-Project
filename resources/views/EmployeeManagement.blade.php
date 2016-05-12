@extends('Layouts.master')

@section('content')
    <link rel="stylesheet" href="src/css/homePage.css">
    <section class="row new-post">

        <br>
        <h1 align="center">Employee Management</h1>
        <br><br>
    </section>
    <section class="row new-post">
        <div class="btn-group-vertical" role="group">
        <form action="{{route('linkAddEmployee')}}" method="post">

            <button type="submit" class="btn btn-success btn-lg btn-block">Add Employee</button><br>
            <input type="hidden" name="_token" value="{{Session::token()}}">
        </form>

        <form action="{{route('linkAttendance')}}" method="post">

            <button type="submit" class="btn btn-success btn-lg btn-block">Marking Attendance</button>
            <input type="hidden" name="_token" value="{{Session::token()}}">
        </form>
        </div>
    </section>

@endsection
