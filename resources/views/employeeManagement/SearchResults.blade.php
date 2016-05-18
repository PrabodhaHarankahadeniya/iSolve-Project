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
                <th align="center"></th>
                <th align="center"></th>
            </tr>
            </thead>
            <tbody>
            <form action="{{route('linkSearchForEmployee')}}" method="get">
                @foreach($employeeList as $employee)
                    <div>
                        <tr>


                            <td width="30%"><input type="text" class="form-control" name="id" id="id"
                                                   value="{{$employee->id}}" readonly></td>
                            <td width="30%"><input type="text" class="form-control" name="name" id="name"
                                                   value="{{$employee->name}}" readonly></td>
                            <td width="15%"><input type="text" class="form-control" name="teleNo"
                                                   id="teleNo"
                                                   value="{{$employee->teleNo}}" readonly></td>
                            <td width="10%"><input type="text" class="form-control" name="nicNo" id="nicNo"
                                                   value="{{$employee->nicNo}}" readonly></td>
                            <td width="10%"><input type="text" class="form-control" name="gender"
                                                   id="gender"
                                                   value="{{$employee->gender}}" readonly></td>
                            <td width="30%"><input type="text" class="form-control" name="address"
                                                   id="address"
                                                   value="{{$employee->address}}" readonly></td>
                            <td width="10%"><input type="text" class="form-control" name="post" id="post"
                                                   value="{{$employee->post}}" readonly></td>
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