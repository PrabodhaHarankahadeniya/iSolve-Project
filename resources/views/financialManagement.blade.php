@extends('Layouts.master')

@section('content')
    <link rel="stylesheet" href="src/css/homePage.css">
    <section class="row new-post">

        <br>
        <h1>Financial Management</h1>
        <br>
       <!-- <img src="src/img/banner-3.jpg"/>-->
    </section>

    <section class="row new-post">
        <form action="#" method="post">

            <button type="submit" class="button">Settled Cheques</button>
            <input type="hidden" name="_token" value="{{Session::token()}}">
        </form>

        <form action="#" method="post">
            <button type="submit" class="button">Non-settled Cheques</button>
            <input type="hidden" name="_token" value="{{Session::token()}}">
        </form>

        <form action="#" method="post">
            <button type="submit" class="button">Returned Cheques</button>
            <input type="hidden" name="_token" value="{{Session::token()}}">
        </form>

        <form action="#" method="post">
            <button type="submit" class="button">Business Report</button>
            <input type="hidden" name="_token" value="{{Session::token()}}">
        </form>

    </section>
@endsection
