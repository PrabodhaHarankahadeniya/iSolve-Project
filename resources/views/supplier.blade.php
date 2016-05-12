@extends('Layouts.master')

@section('content')
    <link rel="stylesheet" href="src/css/homePage.css">
    <section class="row new-post">

        <br>

        <br><br>
        <section class="row new-post">

            <br>
            <h1 align="center">Suppliers </h1>
            <br>
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th align="center">Name</th>

                    <th align="center">TeleNo</th>
                </tr>
                </thead>
                <tbody>

                @foreach($suppliers as $temp)

                    <div>
                        <tr>
                            <td>{{$temp->Name}}</td>

                            <td>{{$temp->TeleNo}}</td>
                        </tr>

                    </div>
                @endforeach
                </tbody>
            </table>

    </section>
@endsection