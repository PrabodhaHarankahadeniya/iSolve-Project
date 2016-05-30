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

@endsection
@section('content')
    <link rel="stylesheet" href="src/css/homePage.css">
    <section class="row new-post">

        <br>
        <h1>Stock Management</h1>
        <br>
    </section>

    <section class="row new-post">
        <div style="float:left; width:40%;">

<br>
        <div class="btn-group-vertical" role="group">

            <form action="{{route('linkUpdateStocks')}}" method="post">

                <button type="submit" class="btn btn-success btn-lg btn-block"><img class="image" src="src/img/icon1.jpg" alt="Save icon"/> Update Stocks</button><br>
                <input type="hidden" name="_token" value="{{Session::token()}}">

            </form>

            <form action="{{route('linkPaddyStock')}}" method="post">

                <button type="submit" class="btn btn-success btn-lg btn-block"><img class="image" src="src/img/icon2.jpg" alt="Save icon"/> Paddy Stock</button><br>
                <input type="hidden" name="_token" value="{{Session::token()}}">
            </form>

            <form action="{{route('linkRiceStock')}}" method="post">

                <button type="submit" class="btn btn-success btn-lg btn-block"><img class="image" src="src/img/icon3.jpg" alt="Save icon"/> Rice Stock</button><br>
                <input type="hidden" name="_token" value="{{Session::token()}}">
            </form>

            <form action="{{route('linkFlourStock')}}" method="post">

                <button type="submit" class="btn btn-success btn-lg btn-block" ><img class="image" src="src/img/icon4.jpg" alt="Save icon"/> Flour Stock</button><br>
                <input type="hidden" name="_token" value="{{Session::token()}}">
            </form>

            <form action="{{route('linkStockExchange')}}" method="post">

                <button type="submit" class="btn btn-success btn-lg btn-block" ><img class="image" src="src/img/icon5.png" alt="Save icon"/> Stock Exchange</button>
                <input type="hidden" name="_token" value="{{Session::token()}}">
            </form>
        </div>
        </div>
        <div style="float:left; width:60%;">
            <img width="50%" src="src/img/unnamed.png"/>
        </div>
    </section>

@endsection