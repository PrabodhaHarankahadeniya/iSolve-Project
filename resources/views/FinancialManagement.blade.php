@extends('Layouts.master')

@section('content')
    <link rel="stylesheet" href="src/css/homePage.css">
    <section class="row new-post">

        <br>


        <h1 align="center">Financial Management</h1>
        <br><br>

       <!-- <img src="src/img/banner-3.jpg"/>-->
    </section>


    <section class="row new-post">
        <div class="btn-group" role="group">
            <div>
                <label class="" for="settledCheques"><h3>Settled Cheques :</h3></label>
                <a class="btn btn-success btn-lg" href="{{route('settledPayable')}} " role="button">Settled Payable Cheques</a>
                <a class="btn btn-success btn-lg" href="{{route('settledRecievable')}} " role="button">Settled Recievable Cheques</a>
            </div>
            <div>
                <label class="" for="nonSettledCheques"><h3>Non Settled Cheques :</h3></label>
                <a class="btn btn-success btn-lg" href="{{route('nonSettledPayable')}}" role="button">Non Settled Payable Cheques</a>
                <a class="btn btn-success btn-lg" href="{{route('nonSettledRecievable')}}" role="button">Non Settled Recievable Cheques</a>
            </div>
            <div>
                <label class="" for="returnedCheques"><h3>Returned Cheques :</h3></label>
                <a class="btn btn-success btn-lg" href="{{route('returnedPayable')}}" role="button">Returned Payable Cheques</a>
                <a class="btn btn-success btn-lg" href="{{route('returnedRecievable')}}" role="button">Returned Recievable Cheques</a>
            </div>

            <br><br><br>

            <form action="{{route('linkBusinessReport')}}" method="post">

                <button type="submit" class="btn btn-success btn-lg btn-block" >Business Report</button>
                <input type="hidden" name="_token" value="{{Session::token()}}">
            </form>
        </div>
    </section>

@endsection
