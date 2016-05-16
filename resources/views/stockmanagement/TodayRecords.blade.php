@extends('Layouts.master')

@section('content')
    <link rel="stylesheet" href="src/css/homePage.css">
    <section class="row new-post">

        <br>
        <h1>Today Records</h1>
        <br><br>

        <div class="row new-post">

            <div class="btn-group-vertical" role="group">
                <a href="{{route('linkaddPaddy')}}"><button class="btn btn-success btn-lg btn-block">Paddy Stock to Rice Mill</button></a><br>
                <a href="{{route('paddyStocktoRiceMill')}}"><button class="btn btn-success btn-lg btn-block">Paddy Stock to Rice Mill</button></a><br>
                <a href="{{route('riceMilltoRiceStock')}}"><button  class="btn btn-success btn-lg btn-block">Rice Mill to Rice Stock</button></a><br>
                <a href="{{route('riceStocktoFlourMill')}}"><button class="btn btn-success btn-lg btn-block">Rice Stock to Flour Mill</button></a><br>
                <a href="{{route('flourMilltoFlourStock')}}"><button class="btn btn-success btn-lg btn-block">Flour Mill to Flour Stock</button></a><br>
                <a href="{{route('paddyStocktoRiceMill')}}"><button class="btn btn-success btn-lg btn-block">Paddy Stock to Rice Mill</button></a><br>
            </div>


        </div>

    </section>
@endsection