@extends('Layouts.master')

@section('content')
    <link rel="stylesheet" href="src/css/homePage.css">
    <section class="row new-post">

        <br>
        <h1>Marking Attendance</h1>
        <br><br>

        <h3 align="right">Date  :  {{date("Y/m/d")}}</h3>
    </section>
@endsection