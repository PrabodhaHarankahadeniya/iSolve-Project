@extends('Layouts.master')

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

                <button type="submit" class="btn btn-success btn-lg btn-block">Update Stocks</button><br>
                <input type="hidden" name="_token" value="{{Session::token()}}">

            </form>

            <form action="{{route('linkPaddyStock')}}" method="post">

                <button type="submit" class="btn btn-success btn-lg btn-block">Paddy Stock</button><br>
                <input type="hidden" name="_token" value="{{Session::token()}}">
            </form>

            <form action="{{route('linkRiceStock')}}" method="post">

                <button type="submit" class="btn btn-success btn-lg btn-block">Rice Stock</button><br>
                <input type="hidden" name="_token" value="{{Session::token()}}">
            </form>

            <form action="{{route('linkFlourStock')}}" method="post">

                <button type="submit" class="btn btn-success btn-lg btn-block" >Flour Stock</button><br>
                <input type="hidden" name="_token" value="{{Session::token()}}">
            </form>

            <form action="{{route('linkStockExchange')}}" method="post">

                <button type="submit" class="btn btn-success btn-lg btn-block" >Stock Exchange</button>
                <input type="hidden" name="_token" value="{{Session::token()}}">
            </form>
        </div>
        </div>
        <div style="float:left; width:60%;">
            <img width="50%" src="src/img/unnamed.png"/>
        </div>
    </section>

@endsection