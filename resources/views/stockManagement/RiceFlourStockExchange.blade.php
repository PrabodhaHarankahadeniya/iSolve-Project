@extends('Layouts.master')

@section('content')
    <section class="row new-post">

        <br>
        <h1>Rice Flour Stock Exchange</h1>
        <br><br>
        @if($errors!=null)
            @foreach($errors as $error)
                <div class="alert alert-warning" role="alert">
                    {{$error}}
                </div>
            @endforeach
        @endif
        <form action="{{route('RiceFlourStockExchange')}}" class="form-horizontal" role="form" method="post">
            <div class="form-group">
                <label class="control-label col-sm-2" for="from">From Date :</label>
                <div class="col-sm-2">
                    <input type="date" class="form-control" name="fromDate" id="date" value="{{$fromDate}}" required>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="from">To Date :</label>
                <div class="col-sm-2">
                    <input type="date" class="form-control" name="toDate" id="date" value="{{$toDate}}" required>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-primary">submit</button>
                    <input type="hidden" name="_token" value="{{Session::token()}}">
                </div>
            </div>
        </form>
        @if($riceTypes!=null)
            <button type="submit" class="btn btn-primary" id="addChart" onclick="document.getElementById('Chart').style.display='';
                document.getElementById('table').style.display='none'; return false">Chart</button><br><br>
        <table class="table table-bordered" id="table">
            <thead>
            <tr>
                <th align="center">Type</th>
                <th align="center">Rice to Mill</th>
                <th align="center">Flour from Mill</th>
                <th align="center">Percentage</th>
            </tr>
            </thead>
            <tbody>
            @foreach($riceTypes as $temp)
                <?php $temp2;
                if($temp=='SuduKekulu'){
                    $temp2='WhiteRiceFlour';
                }
                else{
                    $temp2='RedKekuluFlour';}?>
                <div>
                    <tr>
                        <td>{{$temp}}</td>
                        <td>{{$riceAmounts[$temp] }}</td>
                        <td>{{$flourAmounts[$temp2]}}</td>
                        <?php if($riceAmounts[$temp]!=0){ ?>
                        <td>{{$flourAmounts[$temp2]/$riceAmounts[$temp]*100}}{{'%'}}</td>
                        <?php } ?>
                    </tr>
                </div>
            @endforeach
            </tbody>
        </table>
        @endif

    </section>
    <section class="column new-post" id="Chart" style="display:none">
        <script src={{URL::to('src/js/lib/jquery.canvasjs.min.js')}}></script>
        <script type="text/javascript">

            window.onload = function () {
                var chart = new CanvasJS.Chart("chartContainer", {
                    data: [
                        {
                            // Change type to "doughnut", "line", "splineArea", etc.
                            type: "column",
                            dataPoints: [
                                    @if($riceTypes!=null)
                                    @foreach($riceTypes as $temp)
                                    <?php $temp2;
                                    if($temp=='SuduKekulu'){
                                        $temp2='WhiteRiceFlour';
                                    }
                                    else{
                                        $temp2='RedKekuluFlour';}?>
                                    { label:'{{$temp}}',  y: <?php if($riceAmounts[$temp]!=0){ ?>
                                        {{$flourAmounts[$temp2]/$riceAmounts[$temp]*100}}
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