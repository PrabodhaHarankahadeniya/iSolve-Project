@extends('Layouts.master')
<style>
    h1{
        text-align: center;
        font-family: Times;

    }

</style>

@section('header')
    <?php $users = \App\User::all();?>
    @foreach($users as $user)

        @if($user->username=="admin" and $user->user_type=="currentUser")
            @include('includes.header')
        @elseif($user->username=="clerk" and $user->user_type=="currentUser")
            @include('includes.headerClerk')

        @endif
    @endforeach
@endsection

@section('content')
    <link rel="stylesheet" href="src/css/homePage.css">
    <section class="row new-post">

        <div class="page-header">
        <h1>Stock Exchange</h1>
        </div><br>

            <div style="float:left; width:40%;"><br>
            <div class="btn-group-vertical" role="group">
                <a class="btn btn-success btn-lg btn-block" href="{{route('getPaddyRiceStockExchange')}}" role="button">Paddy Rice Stock Exchange </a><br>
                <a href="{{route('getRiceFlourStockExchange')}}" class="btn btn-success btn-lg btn-block" role="button">Rice Flour Stock Exchange</a><br>
            </div>


        </div>
            <div style="float:left; width:60%;">
                <img width="50%" src="src/img/download.jpg"/>
            </div>
    </section>
@endsection