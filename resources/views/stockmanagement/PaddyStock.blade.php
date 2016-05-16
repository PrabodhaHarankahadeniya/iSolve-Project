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
                <th align="center">type</th>
                <th align="center">quantity_in_kg</th>
            </tr>
            </thead>
            <tbody>
            @foreach($paddy as $temp)
                <div>
                    <tr>
                        <td>{{$temp->type}}</td>
                        <td>{{$temp->quantity_in_kg}}</td>
                    </tr>
                </div>
            @endforeach
            <h3>Paddy stock was last updated in  :  {{$temp->updated_at}}</h3><br>
            </tbody>
        </table>

    </section>
@endsection