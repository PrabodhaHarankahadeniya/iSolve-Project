@extends('Layouts.master')

@section('content')
    <link rel="stylesheet" href="src/css/homePage.css">
<section class="row new-post">
    <div class="buttonBlock">

        <form action="{{route('linkemployee')}}" method="post">

            <button type="submit" class="button">Employee Management</button>
            <input type="hidden" name="_token" value="{{Session::token()}}">
        </form>

        <form action="{{route('linkorder')}}" method="post">
            <button type="submit" class="button">Order Management</button>
            <input type="hidden" name="_token" value="{{Session::token()}}">
        </form>

        <form action="{{route('linkstock')}}" method="post">
            <button type="submit" class="button">Stock Management</button>
            <input type="hidden" name="_token" value="{{Session::token()}}">
        </form>

        <form action="{{route('linkfinancial')}}" method="post">
            <button type="submit" class="button">Financial Management</button>
            <input type="hidden" name="_token" value="{{Session::token()}}">
        </form>

    </div>

    <br><br><br>
    <h1>SHAKUNI PVT(Ltd) </h1>
    <br><br><br>
    <img src="img/banner-3.jpg"/>
</section>
@endsection