@extends('Layouts.master')

@section('content')
    <link rel="stylesheet" href="src/css/homePage.css">
    <section class="row new-post">

        <br>
        <h1>Update Stocks</h1>
        <br><br>

        <div class="row new-post">

            <div class="btn-group-vertical" role="group">
                <a class="btn btn-success btn-lg btn-block" href="{{route('addPaddytoStock')}}" role="button">Add Paddy to Stock </a><br>
                <a href="{{route('paddyStocktoRiceMill')}}" class="btn btn-success btn-lg btn-block" role="button">Paddy Stock to Rice Mill</a><br>
                <a href="{{route('riceMilltoRiceStock')}}" class="btn btn-success btn-lg btn-block"role="button">Rice Mill to Rice Stock</a><br>
                <a href="{{route('riceStocktoFlourMill')}}"class="btn btn-success btn-lg btn-block" role="button">Rice Stock to Flour Mill</a><br>
                <a href="{{route('flourMilltoFlourStock')}}" class="btn btn-success btn-lg btn-block"role="button">Flour Mill to Flour Stock</a><br>
                <a href="{{route('getFlourfromStock')}}" class="btn btn-success btn-lg btn-block" role="button">Get Flour from Stock</a><br>
            </div>


        </div>

    </section>
@endsection