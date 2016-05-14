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

                <div class="btn-group-vertical" role="group">
                    <a class="btn btn-success btn-lg btn-block" href="{{route('purchasePaddyForm')}}" role="button">Purchase Paddy</a><br>
                    <a class="btn btn-success btn-lg btn-block" href="{{route('purchaseRiceForm')}}" role="button">Purchase Rice</a><br>
                    <a class="btn btn-success btn-lg btn-block" href="{{route('sellRiceForm')}}" role="button">Sell Rice</a><br>
                    <a class="btn btn-success btn-lg btn-block" href="{{route('sellFlourForm')}}" role="button">Sell Flour</a><br>

                </div>


        </div>
    </div>
@endsection
