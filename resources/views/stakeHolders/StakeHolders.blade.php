@extends('Layouts.master')

@section('content')
    <link rel="stylesheet" href="src/css/homePage.css">
    <section class="row new-post">

        <br>
        <h1>Stake Holders</h1>
        <br>
        <div style="float:left; width:30%;">
            <br><br><br><br><br><br>
    <div class="btn-group-vertical" role="group">
    <a href="{{route('Customer')}}" class="btn btn-success btn-lg btn-block" role="button">Add Customer</a><br>
    <a href="{{route('Supplier')}}" class="btn btn-success btn-lg btn-block" role="button">Add Supplier</a><br>
    </div>

        </div>
        <div style="float:right; width:70%;">
            <img  width="60%" src="src/img/Stakeholder-Icon.png"/>
            <br>
        </div>

    </section>

@endsection