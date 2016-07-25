@extends('Layouts.master')
<style>
    h1{
        text-align: center;
        font-family: Times;

    }

</style>
@section('content')
    <link rel="stylesheet" href="src/css/homePage.css">
    <section class="row new-post">

        <div class="page-header">
        <h1>Update Stocks</h1>
        </div><br>

        <div class="row new-post">
            <div style="float:left; width:40%;"><br>
            <div class="btn-group-vertical" role="group">
                <a class="btn btn-success btn-lg btn-block" name="addPaddytoStock" href="{{route('addPaddytoStock')}}" role="button">  Add Paddy to Stock </a><br>
                <a href="{{route('paddyStocktoRiceMill')}}" class="btn btn-success btn-lg btn-block" role="button">Paddy Stock to Rice Mill</a><br>
                <a href="{{route('riceMilltoRiceStock')}}" class="btn btn-success btn-lg btn-block"role="button">Rice Mill to Rice Stock</a><br>
                <a href="{{route('riceStocktoFlourMill')}}"class="btn btn-success btn-lg btn-block" role="button">Rice Stock to Flour Mill</a><br>
                <a href="{{route('flourMilltoFlourStock')}}" class="btn btn-success btn-lg btn-block"role="button">Flour Mill to Flour Stock</a><br>
                <a href="{{route('getFlourfromStock')}}" class="btn btn-success btn-lg btn-block" role="button">Get Flour from Stock</a><br>
            </div>


        </div>
        <div style="float:left; width:60%;">
            <img width="50%" src="src/img/stocks.jpg"/>
        </div>
    </section>
@endsection