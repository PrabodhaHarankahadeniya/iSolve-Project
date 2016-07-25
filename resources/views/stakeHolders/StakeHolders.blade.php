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
            height:30px;

        }

    </style>
@section('content')
    <link rel="stylesheet" href="src/css/homePage.css">
    <section class="row new-post">

        <br>
        <h1>Stake Holders</h1>
        <br>
        <div style="float:left; width:35%;">
            <br><br><br><br><br><br>
    <div class="btn-group-vertical" role="group">
    <a href="{{route('Customer')}}" class="btn btn-success btn-lg btn-block"
       role="button"><img class="image" src="src/img/icon11.jpg" alt="Save icon"/>Customers</a><br>
    <a href="{{route('Supplier')}}" class="btn btn-success btn-lg btn-block"
       role="button"><img class="image" src="src/img/icon12.jpg" alt="Save icon"/>Suppliers</a><br>
    </div>

        </div>
        <div style="float:right; width:65%;">
            <br>
            <img  width="50%" src="src/img/stakeholder.jpg"/>
            <br>
        </div>

    </section>

@endsection