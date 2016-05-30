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
@section('content')
    <link rel="stylesheet" href="src/css/homePage.css">
    <section class="row new-post">

        <br>
        <h1>Flour Stock</h1>
        <br><br>

        <table class="table table-bordered">
            <thead>
            <tr>
                <th align="center">Type</th>
                <th align="center">QuantityinKg</th>
            </tr>
            </thead>
            <tbody>

            @foreach($flour as $temp)
                <div>
                    <tr>
                        <td>{{$temp->type}}</td>
                        <td>{{$temp->quantity_in_kg}}</td>
                    </tr>

                </div>
            @endforeach
            <h3>Flour stock was last updated in  :  {{$temp->updated_at}}</h3><br>
            </tbody>
        </table>
        <div >
            <img class="watermark" width="500px" src="src/img/download.jpg"/>
        </div>
    </section>
@endsection