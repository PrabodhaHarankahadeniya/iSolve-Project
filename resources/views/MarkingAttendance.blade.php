@extends('Layouts.master')

@section('content')

    <section class="row new-post">

        <br>
        <h1 align="center">Attendance Sheet</h1>
        <br><br>

        <h3 align="right">Date  :  {{date("Y/m/d")}}</h3>


        <table class="table table-bordered" >
            <thead align="center">
            <tr>
                <th align="center">Employee Name</th>
                <th align="center" colspan="2">Service Type</th>
                <th align="center">OT hours</th>
            </tr>
            </thead>

            <tbody>
            <?php $i=0?>
            @foreach($employeeList as $employee)
                <tr>
                    <td >{{$employee->name}}</td>
                    <td >
                        <label class="radio-inline">
                        <input type="radio" name="day<?php echo $i ?>" value="Half Day" class="radio"/>Half Day</label>
                    </td>
                    <td >
                        <label class="radio-inline">
                        <input type="radio" name="day<?php echo $i ?>" value="Half Day" class="radio"/>Half Day</label>
                    </td>
                    <td contenteditable="true" align="right"></td>
                </tr>
            <?php $i++?>
            @endforeach
            </tbody>

        </table>
        <br>
        <div class="col-sm-offset-10 col-sm-10">
            <button type="submit" class="btn btn-primary">submit</button>
            <input type="hidden" name="_token" value="{{Session::token()}}">

        </div>
    </section>
@endsection