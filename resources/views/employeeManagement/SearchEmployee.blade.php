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

        <div class="container-fluid">

            <div class="page-header">
                <h1 align="center">Employee Search</h1>
            </div>

            <nav class="navbar navbar-default">
                <form action="{{route('searchForEmployee')}}" method="post" >
                    <div class="form-group container" align="center">
                        <div class="row">
                            <div class="col-sm-4" align="center">
                                <br>
                                <input type="text" class="form-control" name="name" id="name" placeholder="Search for Employee"
                                       class="form-horizontal" value="{{Request::old('name')}}" role="form" required>

                            </div>
                            <div class="col-sm-8"  align="center">
                                <br>
                                <button type="submit" class="btn btn-primary">Search</button>
                                <input type="hidden" name="_token" value="{{Session::token()}}">
                            </div>
                        </div>
                    </div>


                </form>
            </nav>
            <hr>
        </div>

    </section>
@endsection