@extends('Layouts.master')
@section('style')
    <style>
        h1{
            text-align: center;
            font-family: Times;

        }
        .watermark {
            opacity: 0.5;
            color: BLACK;
            position: absolute;
            bottom: 0;
            right: 0;
        }

    </style>
@endsection

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
        <h1>Flour Stock</h1>
        </div>
        <br><br>

        <table class="table  table-striped">
            <thead>
            <tr>
                <th align="center">Type</th>
                <th align="center">Quantity(kg)</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $date=null;
            ?>
            @foreach($flour as $temp)
                <div>
                    <tr>
                        <td>{{$temp->type}}</td>
                        <td>{{$temp->quantity_in_kg}}</td>
                    </tr>

                </div>
                <?php
                {{$date=$temp->updated_at;}}
                ?>
            @endforeach

            </tbody>
        </table>
        <br><h3>Flour stock was last updated in  :  {{$date}}</h3><br><br><br><br><br>
        <div >
            <img class="watermark" width="500px" src="src/img/download.jpg"/>
        </div>
    </section>
@endsection