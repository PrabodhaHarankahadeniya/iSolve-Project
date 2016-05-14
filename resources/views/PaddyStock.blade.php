@extends('Layouts.master')
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
                <th align="center">Type</th>
                <th align="center">QuantityinKg</th>
            </tr>
            </thead>
            <tbody>
            @foreach($paddy as $temp)
                <div>
                    <tr>
                        <td>{{$temp->Type}}</td>
                        <td>{{$temp->QuantityinKg}}</td>
                    </tr>
                </div>
            @endforeach
            <h3>Paddy stock was last updated in  :  {{$temp->updated_at}}</h3><br>
            </tbody>
        </table>

    </section>
@endsection