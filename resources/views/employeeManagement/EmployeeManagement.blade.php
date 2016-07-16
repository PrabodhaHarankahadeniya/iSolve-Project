@extends('Layouts.master')
@section('style')
    <style>
        h1{
            text-align: center;
            font-family: Times;

        }
        .image{
            float:left;
            width:20%;
            height:35px;

        }

    </style>
@section('content')
    <link rel="stylesheet" href="src/css/homePage.css">
    <section class="row new-post">

        <br>
        <h1 align="center">Employee Management</h1>
        <br><br>
    </section>
    <section class="row new-post">
        <div style="float:left; width:30%;"><br>
        <div class="btn-group-vertical" role="group">
            <form action="{{route('linkAddEmployee')}}" method="get">

                <button type="submit" class="btn btn-success btn-lg btn-block"><img class="image" src="src/img/icon6.png" alt="Save icon"/> Add/Edit Employee</button>
                <br>
                <input type="hidden" name="_token" value="{{Session::token()}}">
            </form>
            <form action="{{route('linkDeleteEmployee')}}" method="get">

                <button type="submit" class="btn btn-success btn-lg btn-block"><img class="image" src="src/img/icon7.jpg" alt="Save icon"/> Delete Employee</button>
                <br>
                <input type="hidden" name="_token" value="{{Session::token()}}">
            </form>

            <form action="{{route('linkSearchEmployee')}}" method="get">

                <button type="submit" class="btn btn-success btn-lg btn-block"><img class="image" src="src/img/icon8.jpg" alt="Save icon"/> Search Employee</button>
                <br>
                <input type="hidden" name="_token" value="{{Session::token()}}">
            </form>

            <form action="{{route('linkAttendance')}}" method="post">

                <button type="submit" class="btn btn-success btn-lg btn-block"><img class="image" src="src/img/icon9.jpg" alt="Save icon"/> Marking Attendance</button>
                <input type="hidden" name="_token" value="{{Session::token()}}">
                <br>
            </form>


            <form action="{{route('linkCalculateSalary')}}" method="get">

                <button type="submit" class="btn btn-success btn-lg btn-block"><img class="image" src="src/img/icon10.png" alt="Save icon"/> Calculate Salary</button>
                <br>
                <input type="hidden" name="_token" value="{{Session::token()}}">
            </form>
        </div>
        </div>
        <div style="float:right; width:70%;">
            <img width="60%" src="src/img/employee.jpg"/>
            <br>
        </div>

    </section>

@endsection
