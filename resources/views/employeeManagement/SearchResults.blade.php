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
                <h1 align="center">Employee Search Results</h1>
            </div>

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
                                <td width="10%"><input type="text" class="form-control" name="id" id="id"
                                                       value="{{$employee->id}}" readonly></td>
                                <td width="20%"><input type="text" class="form-control" name="name" id="name"
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
                    <tr>
                        <td colspan="11">
                            <button type="submit" class="btn btn-primary">Back</button>
                            <input type="hidden" name="_token" value="{{Session::token()}}">
                        </td>
                    </tr>
                </form>
                </tbody>
            </table>
        </div>

    </section>
@endsection