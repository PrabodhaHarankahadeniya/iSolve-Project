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
<?php use App\PaddyStock;
?>
@section('content')
    <link rel="stylesheet" href="src/css/homePage.css">
    <section class="row new-post">

        <br>
        <h1>Paddy Stock</h1>
        <br><br>

        <table class="table table-bordered">
            <thead>
            <tr>
                <th align="center">type</th>
                <th align="center">quantity_in_kg</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $date=null;
            ?>
            @foreach($paddy as $temp)
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
            <h3>Paddy stock was last updated in  :  {{$date}}</h3><br>
            </tbody>
        </table>
        <div >
            <img class="watermark" width="500px" src="src/img/download.jpg"/>
        </div>
    </section>
@endsection