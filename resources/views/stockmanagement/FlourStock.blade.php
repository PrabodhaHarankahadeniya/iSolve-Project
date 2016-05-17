@extends('Layouts.master')

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

    </section>
@endsection