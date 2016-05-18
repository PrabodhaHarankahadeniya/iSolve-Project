@extends('Layouts.master')

@section('style')
    <style>
        h1 {
            text-align: center;
            font-family: Times;

        }

        input {

        }


    </style>

@endsection

@section('content')

    <section class="row new-post">

        <br>
        <h1>Search Results</h1>
        <br><br>


        <form action="{{route('searchForEmployee')}}" method="post">


            <br><br>
            <div class="form-group {{$errors->has('nicNo') ? 'has-error':''}}">
                <label class="control-label col-sm-2" for="nicNo">Enter Name</label>
                <div class="col-sm-10">
                    <input type="tel" class="form-control" name="name" id="name"
                           placeholder="Enter Name"
                    >
                </div>
            </div>
            <div class="col-sm-offset-10 col-sm-10">
                <button type="submit" class="btn btn-primary">Search</button>
                <input type="hidden" name="_token" value="{{Session::token()}}">

            </div>

        </form>

    </section>
@endsection