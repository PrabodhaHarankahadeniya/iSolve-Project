@extends('Layouts.master')

@section('style')
<style>
    h1{
        text-align: center;
        font-family: Times;


    }
    input{
        border: none;

    }


</style>

@endsection

@section('content')

    <section class="row new-post">

        <br>
        <h1>Attendance Sheet</h1>
        <br><br>
        <form class="form-horizontal">
        <div class="form-group">
            <label class="control-label col-sm-2" for="from">Date :</label>
            <div class="col-sm-2">
                <input type="date" class="form-control" name="date" id="date" >
            </div>
        </div>
        </form>
<br><br>
        <form action="{{route('submitAttendance')}}" method="post">
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
                            <input onclick="document.getElementById('fullDay{{$i}}').checked=false;"
                                   type="radio" name="half{{$i}}" value="halfDay" class="radio" id="halfDay{{$i}}">Half Day</label>
                        </td>
                        <td >
                            <label class="radio-inline">
                            <input onclick="document.getElementById('halfDay{{$i}}').checked=false;"
                                    type="radio" name="full{{$i}}" value="fullDay" class="radio" id="fullDay{{$i}}">Full Day</label>
                        </td>
                        <td align="right"><input type="text" name="hours{{$i}}" id=hours{{$i}}"></td>
                    </tr>
                <?php $i++?>
                @endforeach
                </tbody>

            </table>
        </form>
        <br>
        <div class="col-sm-offset-10 col-sm-10">
            <button type="submit" class="btn btn-primary">submit</button>
            <input type="hidden" name="_token" value="{{Session::token()}}">

        </div>
    </section>
@endsection