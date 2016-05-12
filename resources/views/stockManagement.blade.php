@extends('Layouts.master')

@section('content')
    <link rel="stylesheet"href="{{URL::to('../src/css/main.css')}}">
    <section class="row new-post">

        <br>
        <h1>Stock Management</h1>
        <br>
        <img src="src/img/pic1.png"/>
    </section>

    <section class="row new-post">
        <div class="btn-group-vertical" role="group">

            <form action="{{route('linkTodayRecords')}}" method="post">

                <button type="button" class="btn btn-success btn-lg btn-block">Today Records</button><br>
                <input type="hidden" name="_token" value="{{Session::token()}}">

            </form>

            <form action="{{route('linkPaddyStock')}}" method="post">

                <button type="button" class="btn btn-success btn-lg btn-block">Paddy Stock</button><br>
                <input type="hidden" name="_token" value="{{Session::token()}}">
            </form>

            <form action="{{route('linkRiceStock')}}" method="post">

                <button type="button" class="btn btn-success btn-lg btn-block">Rice Stock</button><br>
                <input type="hidden" name="_token" value="{{Session::token()}}">
            </form>

            <form action="{{route('linkFlourStock')}}" method="post">

                <button type="button" class="btn btn-success btn-lg btn-block" >Flour Stock</button><br>
                <input type="hidden" name="_token" value="{{Session::token()}}">
            </form>

            <form action="{{route('linkStockExchange')}}" method="post">

                <button type="button" class="btn btn-success btn-lg btn-block" >Stock Exchange</button>
                <input type="hidden" name="_token" value="{{Session::token()}}">
            </form>
        </div>

    </section>

@endsection