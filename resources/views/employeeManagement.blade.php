@extends('Layouts.master')

@section('content')
    <link rel="stylesheet" href="src/css/homePage.css">
    <section class="row new-post">

        <br>
        <h1>Employee Management</h1>
        <br>
    </section>
    <section class="row new-post">
        <form action="{{route('linkattendance')}}" method="post">

            <button type="submit" class="button">Marking Attendance</button><br><br><br>
            <input type="hidden" name="_token" value="{{Session::token()}}">
        </form>

    </section>

@endsection
