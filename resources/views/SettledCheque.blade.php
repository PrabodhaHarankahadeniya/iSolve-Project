@extends('Layouts.master')

@section('content')
    <link rel="stylesheet" href="src/css/homePage.css">
    <section class="row new-post">

        <br>
        <h1>Settled Cheque Report </h1>
        <br><br>

        <table class="table table-bordered">
            <thead>
            <tr>
                <th align="center">Cheque No.</th>
                <th align="center">Bank</th>
                <th align="center">Branch</th>
                <th align="center">Due date</th>
                <th align="center">Amount(Rs.)</th>


            </tr>
            </thead>
            <tbody>

            @foreach($cheques as $cheque)
                @if($cheque->settledStatus==1)

                        <div>
                            <tr>
                                <td>{{$cheque->chequeNo}}</td>
                                <td>{{$cheque->bank}}</td>
                                <td>{{$cheque->branch}}</td>
                                <td>{{$cheque->date}}</td>
                                <td align="right">{{$cheque->amount}}</td>


                            </tr>


                        </div>

                @endif
            @endforeach
            </tbody>
        </table>

    </section>
@endsection