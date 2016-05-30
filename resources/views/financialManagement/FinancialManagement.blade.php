@extends('Layouts.master')

@section('content')
    <link rel="stylesheet" href="src/css/homePage.css">
    <section class="row new-post">

        <br>


        <h1 align="center">Financial Management</h1>
        <br><br>


    </section>


    <section class="row new-post">
        <div style="float:left; width:70%;">

            <br>
        <form class="form-horizontal" role="form">

            <div class="form-group">
                <label class="control-label col-md-3" for="settledCheques"> <h4>Settled Cheques :</h4></label>
                <div class="col-sm-6">
                <a class="btn btn-success btn-lg" href="{{route('settledPayable')}} " role="button">Payable Cheques</a>
                <a class="btn btn-success btn-lg" href="{{route('settledRecievable')}} " role="button">Recievable Cheques</a>
                    </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-3" for="nonSettledCheques"><h4>Non Settled Cheques :</h4></label>
                <div class="col-sm-6">
                <a class="btn btn-success btn-lg" href="{{route('nonSettledPayable')}}" role="button">Payable Cheques</a>
                <a class="btn btn-success btn-lg" href="{{route('nonSettledRecievable')}}" role="button">Recievable Cheques</a>
                    </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-3" for="returnedCheques"><h4>Returned Cheques :</h4></label>
                <div class="col-sm-6">
                <a class="btn btn-success btn-lg" href="{{route('returnedPayable')}}" role="button">Payable Cheques</a>
                <a class="btn btn-success btn-lg" href="{{route('returnedRecievable')}}" role="button">Recievable Cheques</a>
                   <br><br><br>

                        <a class="btn btn-success btn-lg" href="{{route('businessReport')}}" role="button">Business Report</a>


                </div>
            </div >

            <br><br><br>



            </form>
        </div>
        <div style="float:right; width:30%;">
            <img width="100%" src="src/img/finance.jpg"/>
            <br>
            </div>
    </section>

@endsection
