@extends('Layouts.master')

@section('content')
    <link rel="stylesheet" href="src/css/homePage.css">
    <section class="row new-post">

        <br>


        <h1 align="center">Financial Management</h1>
        <br><br>

       <!-- <img src="src/img/banner-3.jpg"/>-->
    </section>

    <section class="row new-post">
        <div class="btn-group-vertical" role="group">

            <form action="{{route('linkSettledCheque')}}" method="post">

                <button type="submit" class="btn btn-success btn-lg btn-block">Settled Cheques</button><br>
                <input type="hidden" name="_token" value="{{Session::token()}}">

            </form>

            <form action="{{route('linkNonSettledCheque')}}" method="post">

                <button type="submit" class="btn btn-success btn-lg btn-block">Non-settled Cheques</button><br>
                <input type="hidden" name="_token" value="{{Session::token()}}">
            </form>

            <form action="{{route('linkReturnedCheque')}}" method="post">

                <button type="submit" class="btn btn-success btn-lg btn-block">Returned Cheques</button><br>
                <input type="hidden" name="_token" value="{{Session::token()}}">
            </form>

            <form action="{{route('linkBusinessReport')}}" method="post">

                <button type="submit" class="btn btn-success btn-lg btn-block" >Business Report</button>
                <input type="hidden" name="_token" value="{{Session::token()}}">
            </form>
        </div>
    </section>
@endsection
