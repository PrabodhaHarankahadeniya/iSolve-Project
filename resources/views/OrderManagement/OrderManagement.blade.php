@extends('Layouts.master')

@section('content')
    <link rel="stylesheet" href="src/css/homePage.css">
    <div class="container">

        <section class="row new-post">

            <br>
            <h1>Order Management</h1>
            <br><br>
            <!--<img src="src/img/banner-3.jpg"/>-->
        </section>
        <div class="row new-post">
            <div style="float:left; width:30%;">
                <div class="btn-group-vertical" role="group">
                    <a class="btn btn-success btn-lg btn-block" href="{{route('purchasePaddyForm')}}" role="button">Purchase Paddy</a><br>
                    <a class="btn btn-success btn-lg btn-block" href="{{route('purchaseRiceForm')}}" role="button">Purchase Rice</a><br>
                    <a class="btn btn-success btn-lg btn-block" href="{{route('sellRiceForm')}}" role="button">Sell Rice</a><br>
                    <a class="btn btn-success btn-lg btn-block" href="{{route('sellFlourForm')}}" role="button">Sell Flour</a><br>
                    </div>
                </div>
            <div style="float:right; width:70%;">


                <img  width="200px" height="200" src="src/img/phone.jpg">
                <img  width="200px" height="200" src="src/img/truck.jpg">
                <img  width="200px" height="200" src="src/img/Lagrer-deal-icon.gif">

            </div>
            <br>
            <div style="float:left; width:100%;">


                <form class="form-horizontal" role="form">
                    <div class="form-group">
                        <label class="control-label col-md-2" for="purchases"> <h4>Purchases :</h4></label>
                        <div class="col-sm-4">
                            <a class="btn btn-success btn-lg" href="{{route('settledPurchases')}} " role="button">Settled</a>
                            <a class="btn btn-success btn-lg" href="{{route('nonSettledPurchases')}} " role="button">Non Settled</a>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-2" for="Order"><h4>Orders :</h4></label>
                        <div class="col-sm-4">
                            <a class="btn btn-success btn-lg" href="{{route('settledOrders')}} " role="button">Settled</a>
                            <a class="btn btn-success btn-lg" href="{{route('nonSettledOrders')}} " role="button">Non Settled</a>
                        </div>
                    </div>
                </form>
                <br><br><br><br>

</div>

        </div>

    </div>
@endsection
