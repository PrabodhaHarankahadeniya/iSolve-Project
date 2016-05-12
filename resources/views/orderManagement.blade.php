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
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="btn-group-vertical" role="group">
                    <a href="{{route('purchasePaddy')}}"><button type="" class="btn btn-primary">Purchase Paddy</button></a>
                    <a href="{{route('purchaseRice')}}"><button type="" class="btn btn-primary">Purchase Rice</button></a>
                    <a href="{{route('sellRice')}}"><button type="" class="btn btn-primary">Sell Rice</button></a>
                    <a href="{{route('sellFlour')}}"><button type="" class="btn btn-primary">Sell Flour</button></a>

                </div>
            </div>

        </div>
    </div>
@endsection
