@extends('Layouts.master')
@section('style')
    <style>
        h1{
            text-align: center;
            font-family: Times;

        }
        .image{
            float:left;
            width:35px;
            height:30px;

        }

    </style>
    <style>

        .sidenav1 {
            height: 40%;
            width: 0;
            position: fixed;
            z-index: 0;
            top: 0;
            left: 0;
            background-color: #111;
            overflow-x: hidden;
            transition: 0.5s;
            padding-top: 60px;
        }
        .sidenav {
            height: 100%;
            width: 0;
            position: fixed;
            z-index: 0;
            top: 0;
            left: 0;
            background-color: #111;
            overflow-x: hidden;
            transition: 0.5s;
            padding-top: 60px;
        }
        .sidenav a {
            padding: 8px 8px 8px 32px;
            text-decoration: none;
            font-size: 25px;
            color: #818181;
            display: block;
            transition: 0.3s
        }

        .sidenav a:hover, .offcanvas a:focus{
            color: #f1f1f1;
        }

        .closebtn {
            position: absolute;
            top: 0;
            right: 25px;
            font-size: 36px !important;
            margin-left: 50px;
        }

        @media screen and (max-height: 450px) {
            .sidenav {padding-top: 15px;}
            .sidenav a {font-size: 18px;}
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


        <div class="btn-group-vertical" role="group">
            <div id="mySidenav1" class="sidenav">
                <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
                <a  name="addPaddytoStock" href="{{route('addPaddytoStock')}}" role="button">  Add Paddy to Stock </a><br>
                <a href="{{route('paddyStocktoRiceMill')}}"  role="button">Paddy Stock to Rice Mill</a><br>
                <a href="{{route('riceMilltoRiceStock')}}" role="button">Rice Mill to Rice Stock</a><br>
                <a href="{{route('riceStocktoFlourMill')}}" role="button">Rice Stock to Flour Mill</a><br>
                <a href="{{route('flourMilltoFlourStock')}}" role="button">Flour Mill to Flour Stock</a><br>
                <a href="{{route('getFlourfromStock')}}"  role="button">Get Flour from Stock</a><br>
            </div>
            <span style="font-size:30px;cursor:pointer" onclick="openNav()"><button type="submit" class="btn btn-success btn-lg btn-block" ><img class="image" src="src/img/icon1.jpg" alt="Save icon"/> Update Stocks</button><br></span>

            <form action="{{route('linkPaddyStock')}}" method="post">

                <button type="submit" class="btn btn-success btn-lg btn-block"><img class="image" src="src/img/icon2.jpg" alt="Save icon"/> Paddy Stock</button><br><br>
                <input type="hidden" name="_token" value="{{Session::token()}}">
            </form>

            <form action="{{route('linkRiceStock')}}" method="post">

                <button type="submit" class="btn btn-success btn-lg btn-block"><img class="image" src="src/img/stocks.jpg" alt="Save icon"/> Rice Stock</button><br><br>
                <input type="hidden" name="_token" value="{{Session::token()}}">
            </form>

            <form action="{{route('linkFlourStock')}}" method="post">

                <button type="submit" class="btn btn-success btn-lg btn-block" ><img class="image" src="src/img/download.jpg" alt="Save icon"/> Flour Stock</button><br><br>
                <input type="hidden" name="_token" value="{{Session::token()}}">
            </form>
            <div id="mySidenav2" class="sidenav">
                <a href="javascript:void(0)" class="closebtn" onclick="closeNav2()">×</a>
                <a  href="{{route('getPaddyRiceStockExchange')}}" role="button">Paddy Rice Stock Exchange</a><br>
                <a  href="{{route('getRiceFlourStockExchange')}}" role="button">Rice Flour Stock Exchange</a><br>
            </div>

            <span style="font-size:30px;cursor:pointer" onclick="openNav2()"><button type="submit" class="btn btn-success btn-lg btn-block" ><img class="image" src="src/img/icon5.png" alt="Save icon"/> Stock Exchange</button></span>

            <script>
                function openNav() {
                    document.getElementById("mySidenav1").style.width = "400px";
                }
                function openNav2() {
                    document.getElementById("mySidenav2").style.width = "400px";
                }
                function closeNav() {
                    document.getElementById("mySidenav1").style.width = "0";
                }
                function closeNav2() {
                    document.getElementById("mySidenav2").style.width = "0";
                }
            </script>
        </div>
        </div>
        <div style="float:left; width:60%;">
            <img width="50%" src="src/img/unnamed.png"/>
        </div>
    </section>

@endsection