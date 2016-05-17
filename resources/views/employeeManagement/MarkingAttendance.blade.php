@extends('Layouts.master')

@section('style')
<style>
    h1{
        text-align: center;
        font-family: Times;


    }

    th{
        text-align: center;

    }


</style>

@endsection

@section('content')

    <section class="row new-post">

        <br>
        <h1>Attendance Sheet</h1>
        <br><br>

        <form action="{{route('submitAttendance')}}" method="post" class="form-horizontal">

                <div class="form-group">
                    <label class="control-label col-sm-2" for="from">Date :</label>
                    <div class="col-sm-2">
                        <input type="date" class="form-control" name="date" id="date" >
                    </div>
                </div>


            <br><br>
            <table class="table table-bordered" width="31%" align="center" >
                <thead align="center">
                <tr>
                    <th>Employee Name</th>

                    <th colspan="3">Service Type</th>
                    <th>OT hours</th>

                </tr>
                </thead>

                <tbody>
                <?php $i=0?>
                @foreach($employeeList as $employee)
                    <tr>
                        <td width="20%">{{$employee->name}}</td>
                        <td width="10%">
                            <div class="input-group">
                            <label class="radio-inline">
                                <input onclick="document.getElementById('fullDay{{$i}}').checked=false;
                                        document.getElementById('halfDay{{$i}}').checked=false;
                                        document.getElementById('hours{{$i}}').disabled=true;"
                                       type="radio" name="absent{{$i}}" id="absent{{$i}}">Absent</label>

                            </div>
                        </td>
                        <td width="10%">
                            <div class="input-group">
                            <label class="radio-inline">
                            <input onclick="document.getElementById('fullDay{{$i}}').checked=false;
                                    document.getElementById('absent{{$i}}').checked=false;
                                    document.getElementById('hours{{$i}}').disabled=false;"
                                   type="radio" name="half{{$i}}" id="halfDay{{$i}}">Half Day</label>
                            </div>
                        </td>
                        <td width="10%">
                            <div class="input-group">
                            <label class="radio-inline">
                            <input onclick="document.getElementById('halfDay{{$i}}').checked=false;
                                    document.getElementById('absent{{$i}}').checked=false;
                                    document.getElementById('hours{{$i}}').disabled=false;"
                                    type="radio" name="full{{$i}}" id="fullDay{{$i}}">Full Day</label>
                            </div>
                        </td>
                        <td width="10%">
                            <div class="input_group">
                            <input type="number" class="form-control" name="hours{{$i}}" id=hours{{$i}}"  align="right" placeholder="OT hours">
                            </div>
                        </td>
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
        </form>

    </section>
@endsection