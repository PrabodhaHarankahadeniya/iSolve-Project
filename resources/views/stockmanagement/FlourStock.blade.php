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
                        <td>{{$temp->Type}}</td>
                        <td>{{$temp->QuantityinKg}}</td>
                    </tr>

                </div>
            @endforeach
            </tbody>
        </table>

    </section>
@endsection