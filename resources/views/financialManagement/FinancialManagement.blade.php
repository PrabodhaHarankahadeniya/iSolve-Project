@extends('Layouts.master')
@section('style')
    <style>
        h1{
            text-align: center;
            font-family: Times;

        }
        .image{
            float:left;
            width:35px;
            height:30px;

        }

    </style>

    @endsection

@section('header')
    <?php $users = \App\User::all();?>
    @foreach($users as $user)

        @if($user->username=="admin" and $user->user_type=="currentUser")
            @include('includes.header')
        @elseif($user->username=="clerk" and $user->user_type=="currentUser")
            @include('includes.headerClerk')

        @endif
    @endforeach
@endsection
@section('content')
    <link rel="stylesheet" href="src/css/homePage.css">
    <section class="row new-post">
        <div class="page-header">
        <h1 align="center">Financial Management</h1>
        </div>


    </section>


    <section class="row new-post">
        <div style="float:left; width:80%;">

            <br>
        <form class="form-horizontal" role="form">

            <div class="form-group">
                <label class="control-label col-md-3" for="settledCheques"> <h4>Settled Cheques :</h4></label>
                <div class="col-sm-6">
                    <a class="btn btn-success btn-lg" href="{{route('settledPayable')}} " role="button"><img class="image" src="src/img/icon18.jpg" alt="Save icon"/> Payable Cheques</a>
                    <a class="btn btn-success btn-lg" href="{{route('settledRecievable')}} " role="button"><img class="image" src="src/img/icon18.jpg" alt="Save icon"/> Recievable Cheques</a>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-3" for="nonSettledCheques"><h4>Non Settled Cheques :</h4></label>
                <div class="col-sm-6">
                <a class="btn btn-success btn-lg" href="{{route('nonSettledPayable')}}" role="button"><img class="image" src="src/img/icon19.jpg" alt="Save icon"/> Payable Cheques</a>
                <a class="btn btn-success btn-lg" href="{{route('nonSettledRecievable')}}" role="button"><img class="image" src="src/img/icon19.jpg" alt="Save icon"/> Recievable Cheques</a>
                    </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-3" for="returnedCheques"><h4>Returned Cheques :</h4></label>
                <div class="col-sm-6">
                <a class="btn btn-success btn-lg" href="{{route('returnedPayable')}}" role="button"><img class="image" src="src/img/icon17.jpg" alt="Save icon"/> Payable Cheques</a>
                <a class="btn btn-success btn-lg" href="{{route('returnedRecievable')}}" role="button"><img class="image" src="src/img/icon17.jpg" alt="Save icon"/> Recievable Cheques</a>
                   <br><br><br>

                        <a class="btn btn-success btn-lg" href="{{route('businessReport')}}" role="button"><img class="image" src="src/img/cover-f.jpg" alt="Save icon"/>Business Report</a>


                </div>
            </div >

            <br><br><br>



            </form>
        </div>
        <br><br><br>
        <div style="float:right; width:20%;">
            <img width="100%" src="src/img/finance.jpg"/>
            <br>
            </div>
    </section>

@endsection
