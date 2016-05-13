@extends('Layouts.master')

@section('content')
    <link rel="stylesheet" href="src/css/homePage.css">
    <section class="row new-post">

        <br>
        <h1>Marking Attendance</h1>
        <br><br>

        <h3 align="right">Date  :  {{date("Y/m/d")}}</h3>


        <table class="table table-bordered">
            <thead>
            <tr>
                <th>Employee Name</th>
                <th colspan="2">Service Type</th>
                <th>OT hours</th>
            </tr>
            </thead>

            <tbody>
            @foreach($employeeList as $employee)
                <tr>
                    <td>{{$employee->name}}</td>
                    <td>
                        <input type="radio" name="day{{$i}}" value="Half Day" class="radio"/>Half Day</td>
                    </td>
                    <td>
                        <input type="radio" name="day{{$i}}" value="Half Day" class="radio"/>Half Day</td>
                    </td>
                    <td contenteditable="true" align="right"></td>
                </tr>

            @endforeach
            </tbody>

        </table>

    </section>
@endsection