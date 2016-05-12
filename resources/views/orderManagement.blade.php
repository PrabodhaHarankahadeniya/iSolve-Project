@extends('Layouts.master')

@section('content')
    <link rel="stylesheet" href="src/css/homePage.css">
    <div class="container">
        <section class="row new-post">

            <br>
            <h1>Order Management</h1>
            <br><br><br>
            <!--<img src="src/img/banner-3.jpg"/>-->
        </section>
        <div class="row new-post">
            <div class="">
                <div class="btn-group-vertical" role="group">
                    <a href="{{route('purchasePaddyForm')}}"><button class="btn btn-success btn-lg btn-block">Purchase Paddy</button></a><br>
                    <a href="{{route('purchaseRiceForm')}}"><button  class="btn btn-success btn-lg btn-block">Purchase Rice</button></a><br>
                    <a href="{{route('sellRiceForm')}}"><button class="btn btn-success btn-lg btn-block">Sell Rice</button></a><br>
                    <a href="{{route('sellFlourForm')}}"><button class="btn btn-success btn-lg btn-block">Sell Flour</button></a><br>

                </div>
            </div>

        </div>
    </div>
@endsection
