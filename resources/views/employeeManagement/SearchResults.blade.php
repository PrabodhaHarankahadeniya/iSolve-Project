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
        <table class="table table-bordered" style="width: 70%" align="center">
            <thead>
            <tr>
                <th align="center">Employee id</th>
                <th align="center">Employee Name</th>
                <th align="center">Telephone Number</th>
                <th align="center">NIC Number</th>
                <th align="center">Gender</th>
                <th align="center">Address</th>
                <th align="center">Designation</th>

            </tr>
            </thead>
            <tbody>
            <form action="{{route('linkSearchEmployee')}}" method="get">
                @foreach($employees as $employee)
                    <div>
                        <tr>
                               <td>{{$employee->id}}</td>


                        </tr>
                    </div>
                @endforeach
            </form>
            </tbody>
        </table>
        <br><br>
        <br>
        <div class="col-sm-offset-10 col-sm-10">
            <button type="submit" class="btn btn-primary">submit</button>
            <input type="hidden" name="_token" value="{{Session::token()}}">
        </div>
    </section>
@endsection