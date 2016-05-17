@extends('Layouts.master')

@section('content')
    <link rel="stylesheet" href="src/css/homePage.css">
    <section class="row new-post">

        <br>
        <h1>Update Stocks</h1>
        <br><br>

        <div class="row new-post">

            <div class="btn-group-vertical" role="group">
                <a class="btn btn-success btn-lg btn-block" href="{{route('getPaddyRiceStockExchange')}}" role="button">Paddy Rice Stock Exchange </a><br>
                <a href="{{route('getRiceFlourStockExchange')}}" class="btn btn-success btn-lg btn-block" role="button">Rice Flour Stock Exchange</a><br>
            </div>


        </div>

    </section>
@endsection