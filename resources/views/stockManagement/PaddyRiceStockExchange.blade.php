@extends('Layouts.master')
<style>
    h1{
        text-align: center;
        font-family: Times;

    }

</style>
@section('content')
    <section class="row new-post">
        <div class="page-header">
        <h1>Paddy Rice Stock Exchange</h1>
        </div><br>
        @if($errors!=null)
            @foreach($errors as $error)
                <div class="alert alert-warning" role="alert">
                {{$error}}
                </div>
            @endforeach
        @endif
        <form action="{{route('PaddyRiceStockExchange')}}" class="form-horizontal" role="form" method="post">
            <div class="form-group">
                <label class="control-label col-sm-2" for="from">From Date :</label>
                <div class="col-sm-2" id="date1" >
                    <input type="date" class="form-control" name="fromDate" id="date"  value="{{$fromDate}}" max="{{date("Y-m-d")}}" required >
                </div>
            </div>

            <div class="form-group" >
                <label class="control-label col-sm-2" for="from">To Date :</label>
                <div class="col-sm-2" id="date2">
                    <input type="date" class="form-control" name="toDate" id="date" value="{{$toDate}}" max="{{date("Y-m-d")}}" required >
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-primary">submit</button>
                    <input type="hidden" name="_token" value="{{Session::token()}}">
                </div>
            </div>

        </form>
        @if($wrong!=null)
            <br><br>
            <div class="alert alert-warning" role="alert">
                {{$wrong}}
            </div>
        @elseif($paddyTypes!=null)
    <section id="table">
        <div class="page-header"></div><br>


            <div align="right"><button type="submit" class="btn btn-primary" id="addChart" onclick="document.getElementById('Chart').style.display='';
                document.getElementById('table').style.display='none'; return false">Chart</button></div>

        <table class="table  table-strip">
            <thead>
            <tr>
                <th align="center">Type</th>
                <th align="center">Paddy to Mill</th>
                <th align="center">Rice from Mill</th>
                <th align="center">Percentage</th>
            </tr>
            </thead>
            <tbody>
            @foreach($paddyTypes as $temp)
                <div>
                    <tr>
                        <td>{{$temp}}</td>
                        <td>{{$paddyAmounts[$temp]}}</td>
                        <td>{{$riceAmountsTrue[$temp]}}</td>

                        @if($paddyAmounts[$temp]!=0)
                            <td>{{$riceAmountsTrue[$temp]/$paddyAmounts[$temp]*100}}{{'%'}}</td>
                        @else
                            <td></td>
                        @endif
                    </tr>
                </div>
            @endforeach
            </tbody>
        </table>
        <br><br><br><br><br>
    </section>
@endif</section>


        <section class="column new-post" id="Chart" style="display:none">
            <button type="submit" class="btn btn-primary" id="addChart" onclick="document.getElementById('Chart').style.display='none';
                document.getElementById('table').style.display=''; return false">Table</button><br><br>
        <script src={{URL::to('src/js/lib/jquery.canvasjs.min.js')}}></script>
        <script type="text/javascript">

            window.onload = function () {
                var chart = new CanvasJS.Chart("chartContainer", {
                    data: [
                        {
                            // Change type to "doughnut", "line", "splineArea", etc.
                            type: "column",
                            dataPoints: [
                                    @if($paddyTypes!=null)
                            @foreach($paddyTypes as $temp)
                                { label:'{{$temp}}',  y: <?php if($paddyAmounts[$temp]!=0){ ?>
                                    {{$riceAmountsTrue[$temp]/$paddyAmounts[$temp]*100}}
                            <?php } else{?>0<?php } ?>},
                                @endforeach
                                    @endif
                            ]
                        }
                    ]
                });
                chart.render();
            }
        </script>

        <div id="chartContainer" style="height:100%; width: 100%;"></div>

    </section>
@endsection