@extends('Layouts.master')

@section('style')
    <style>
        h1 {

            text-align: center;
            font-family: Times;
        }
    </style>
@endsection

@section('content')

    <section class="row new-post">


        <div class="container-fluid">
            <div class="page-header">
                <h1 align="center">Employee Salary Report</h1>
            </div>
            <nav class="navbar navbar-default">
                <div class="container">
                    <form action="{{route('calculateSalaryReport')}}" class="form-horizontal"
                          role="form" method="post" id="date-range-form">


                        <div class="form-group" align="center">
                            <br>
                            <div>
                                <label class="col-xs-2 control-label">From Date</label>
                                <div class="col-xs-2">
                                    <div class="input-group" id="fromDate">
                                        <input type="date" class="form-control" name="fromDate"
                                               required max="{{date("Y-m-d")}}" value="{{Request::old('fromDate')}}"/>
                                        {{--<span class="input-group-addon add-on">--}}
                                            {{--<span class="glyphicon glyphicon-calendar"></span>--}}
                                        {{--</span>--}}
                                    </div>
                                </div>
                            </div>

                            <div>
                                <label class="col-xs-2 control-label">To Date</label>
                                <div class="col-xs-2">
                                    <div class="input-group" id="toDate">
                                        <input type="date" class="form-control" name="toDate" required max="{{date("Y-m-d")}}"
                                               value="{{Request::old('fromDate')}}"/>
                                        {{--<span class="input-group-addon add-on">--}}
                                            {{--<span class="glyphicon glyphicon-calendar"></span>--}}
                                        {{--</span>--}}
                                    </div>
                                </div>
                            </div>
                            {{--<div class="form-group">--}}
                                {{--<label class="control-label col-sm-2" for="from">From :</label>--}}
                                {{--<div class="col-sm-2">--}}
                                    {{--<input type="date" class="form-control" name="from" id="from" value="{{Request::old('date')}}" required>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="form-group">--}}
                                {{--<label class="control-label col-sm-2" for="to">To :</label>--}}
                                {{--<div class="col-sm-2">--}}
                                    {{--<input type="date" class="form-control" name="to" id="to" value="{{Request::old('date')}}" required>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            <div>
                                <div class="col-xs-2">
                                    <button type="submit" class="btn btn-primary">Search</button>
                                    <input type="hidden" name="_token" value="{{Session::token()}}">
                                </div>
                            </div>

                        </div>

                    </form>
                </div>
            </nav>
            <br>

            <br>
            @if($salaries==null)
                @if($date==null)
                    <h4 align="center"> No results found</h4>
                @else
                    <h4 align="center"> No results during {{$date[0]}} to {{$date[1]}}</h4>
                @endif
            @elseif($salaries!=null)
                @if($date!=null)
                    <div>
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
                    </div>
                @endif
                <table class="table  table-striped" style="width: 90%" align="center">
                    <thead class="row">
                    <tr>
                        <th align="center" class="panel-heading">Employee Name</th>
                        <th align="center" class="panel-heading">Gender</th>
                        <th align="center" class="panel-heading">No of Working Days</th>
                        <th align="center">Per day Wage</th>
                        <th align="center">Total Wage</th>
                        <th align="center">No of OT hours</th>
                        <th align="center">Payment per hour for OT</th>
                        <th align="center">Payment for OT hours</th>
                        <th align="center">Gross Salary</th>
                        <th align="center">EPF Deductions</th>
                        <th align="center">ETF Contribution</th>
                        <th align="center">Net Salary</th>

                    </tr>
                    </thead>
                    <tbody>


                    @foreach($salaries as $salary)
                        <?php
                        if($salary->gender==0)
                            $gender="Male";
                        else
                            $gender="Female";
                        ?>
                        <div class="row">
                            <tr>
                                <td width="30%">{{$salary->name}}</td>
                                <td width="15%">{{$gender}}</td>
                                <td width="10%">{{$salary->service_type}}</td>
                                <td width="10%">{{$salary->day_salary}}</td>
                                <td width="10%">{{$salary->cal_day_salary}}</td>
                                <td width="10%">{{$salary->ot_hours}}</td>
                                <td width="10%">{{$salary->ot_hourly_salary}}</td>
                                <td width="10%">{{$salary->cal_ot_hours}}</td>
                                <td width="10%">{{$salary->gross_salary}}</td>
                                <td width="10%">{{$salary->epf}}</td>
                                <td width="10%">{{$salary->etf}}</td>
                                <td width="10%">{{$salary->net_salary}}</td>
                            </tr>
                        </div>
                    @endforeach

                                <!-- composing grand totals-->
                        <div class="row">
                            <tr>
                                <td width="30%"><b>GRAND TOTAL</b></td>
                                <td width="15%"></td>
                                <td width="10%"></td>
                                <td width="10%"></td>
                                <td width="10%"><b>{{$grand_totals['wage']}}</b></td>
                                <td width="10%"></td>
                                <td width="10%"></td>
                                <td width="10%"><b>{{$grand_totals['ot']}}</b></td>
                                <td width="10%"><b>{{$grand_totals['gross_salary']}}</b></td>
                                <td width="10%"><b>{{$grand_totals['epf']}}</b></td>
                                <td width="10%"><b>{{$grand_totals['etf']}}</b></td>
                                <td width="10%"><b>{{$grand_totals['net_salary']}}</b></td>
                            </tr>
                        </div>

                    </tbody>
                </table>
            @endif

        </div>

        <br><br>


    </section>

    <link rel="stylesheet" href="{{URL::to('src/css/lib/datepicker.min.css')}}"/>
    <link rel="stylesheet" href="{{URL::to('src/css/lib/datepicker3.min.css')}}"/>

    <script src="{{URL::to('src/js/lib/bootstrap-datepicker.min.js')}}"></script>
    <script type="text/javascript" src="{{URL::to('src/js/calculateSalary.js')}}"></script>
@endsection

