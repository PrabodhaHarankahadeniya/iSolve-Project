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
        <form action="{{route('linksettledcheque')}}" method="post">

            <button type="submit" class="button">Settled Cheques</button><br><br><br>
            <input type="hidden" name="_token" value="{{Session::token()}}">
        </form>

        <form action="{{route('linknonsettledcheque')}}" method="post">
            <button type="submit" class="button">Non-settled Cheques</button><br><br><br>
            <input type="hidden" name="_token" value="{{Session::token()}}">
        </form>

        <form action="{{route('linkreturnedcheque')}}" method="post">
            <button type="submit" class="button">Returned Cheques</button><br><br><br>
            <input type="hidden" name="_token" value="{{Session::token()}}">
        </form>

        <form action="{{route('linkbusinessreport')}}" method="post">
            <button type="submit" class="button">Business Report</button><br><br><br>
            <input type="hidden" name="_token" value="{{Session::token()}}">
        </form>

    </section>
@endsection
