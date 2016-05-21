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
        td{

            text-align: center;
        }


    </style>

@endsection

@section('content')

    @if($error!=null)
        <div class="alert alert-danger" role="alert">{{$error}}</div>
    @endif
    <form action="{{route('submitDateAttendance')}}" class="form-horizontal" role="form" method="post">
<br><br><br>
        <h3>Enter time period :</h3>
        <div class="form-group">
            <label class="control-label col-sm-2" for="from">From :</label>
            <div class="col-sm-2">
                <input type="date" class="form-control" name="from" id="from" value="{{Request::old('date')}}">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="to">To :</label>
            <div class="col-sm-2">
                <input type="date" class="form-control" name="to" id="to" value="{{Request::old('date')}}">
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-primary">submit</button>
                <input type="hidden" name="_token" value="{{Session::token()}}">

            </div>
        </div>
    </form>
    </section>
@if($attendance!=null)
    <form action="{{route('submitAttendance')}}" method="post" class="form-horizontal">
        <br><br><br>
<h3>Employee Attendance Details</h3>

<br><br>
        <div class="form-group">
            <label class="control-label col-sm-1 " for="from">From :</label>
            <div class="col-sm-2">
                <input type="date" class="form-control" name="from" id="from" value="{{$date[0]}}" readonly>
            </div>

        </div>
        <div class="form-group">
            <label class="control-label col-sm-1" for="to">To :</label>
            <div class="col-sm-2">
                <input type="date" class="form-control" name="to" id="to" value="{{$date[1]}}" readonly>
            </div>
        </div>





        <br><br>
        <table class="table table-bordered" width="25%" align="center" >
            <thead align="center">
            <tr>
                <th>Employee id</th>
                <th>Employee Name</th>
                <th >No of days present</th>

                <th>OT hours</th>

            </tr>
            </thead>

            <tbody>
            <?php $i=0?>
            @foreach($attendance as $record)
                <tr>
                    <td width="5%">{{$record->id}}</td>
                    <td width="10%">
                    {{$record->name}}
                    </td>
                    <td width="5%">
                    {{$record->service_type}}
                    </td>
                    <td width="5%">
                    {{$record->ot_hours}}
                    </td>

                </tr>
                <?php $i++?>
            @endforeach
            </tbody>

        </table>
        <br>


        <br><br><br>
    </form>

@endif
@endsection