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

        <h1 align="center">Employee Salary Report</h1>
        <div class="row">
            <form action="{{route('calculateSalaryReport')}}" class="form-horizontal" role="form" method="post" id="date-range-form">
                <div class="form-group" align="center">
                    <div>
                        <label class="col-xs-2 control-label">From Date</label>
                        <div class="col-xs-2 date">
                            <div class="input-group input-append date" id="fromDatePicker">
                                <input type="text" class="form-control" name="fromDate"
                                       value="{{Request::old('fromDate')}}"/>
                                <span class="input-group-addon add-on"><span
                                            class="glyphicon glyphicon-calendar"></span></span>
                            </div>
                        </div>
                    </div>

                    <div>
                        <label class="col-xs-2 control-label">To Date</label>
                        <div class="col-xs-2 date">
                            <div class="input-group input-append date" id="toDatePicker">
                                <input type="text" class="form-control" name="toDate"
                                       value="{{Request::old('fromDate')}}"/>
                                <span class="input-group-addon add-on"><span
                                            class="glyphicon glyphicon-calendar"></span></span>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="col-xs-2">
                            <button type="submit" class="btn btn-primary">Search</button>
                            <input type="hidden" name="_token" value="{{Session::token()}}">
                        </div>
                    </div>

                </div>

            </form>
        </div>

        <br>

        <br>
        <table class="table table-bordered" style="width: 70%" align="center">
            <thead>
            <tr>
                <th align="center">Employee Name</th>
                <th align="center">Gender</th>
                <th align="center">No of Working Days</th>
                <th align="center">Per day Wage</th>
                <th align="center">Total Wage</th>
                <th align="center">No of OT hours</th>
                <th align="center">Per hour OT</th>
                <th align="center">OT payments</th>
                <th align="center">Gross Salary</th>
                <th align="center">EPF Deductions</th>
                <th align="center">Net Salary</th>

            </tr>
            </thead>
            <tbody>


            @foreach($salaries as $salary)
                <div>
                    <tr>
                        <td width="30%">{{$salary->name}}</td>
                        <td width="15%">{{$salary->gender}}</td>
                        <td width="10%">{{$salary->service_type}}</td>
                        <td width="10%">{{$salary->day_salary}}</td>
                        <td width="10%">{{$salary->cal_day_salary}}</td>
                        <td width="10%">{{$salary->ot_hours}}</td>
                        <td width="10%">{{$salary->ot_hourly_salary}}</td>
                        <td width="10%">{{$salary->cal_ot_hours}}</td>
                        <td width="10%">{{$salary->gross_salary}}</td>
                        <td width="10%">{{$salary->epf}}</td>
                        <td width="10%">{{$salary->net_salary}}</td>
                    </tr>
                </div>
           @endforeach


            </tbody>
        </table>
        <br><br>


    </section>

    <link rel="stylesheet" href="{{URL::to('src/css/lib/datepicker.min.css')}}"/>
    <link rel="stylesheet" href="{{URL::to('src/css/lib/datepicker3.min.css')}}"/>

    <script src="{{URL::to('src/js/lib/bootstrap-datepicker.min.js')}}"></script>
    <script type="text/javascript" src="{{URL::to('src/js/calculateSalary.js')}}"></script>
@endsection

