@extends('Layouts.master')

@section('content')
    <section class="row new-post">

        <br>
        <h1>Paddy Rice Stock Exchange</h1>
        <br><br>
        <form action="{{route('PaddyRiceStockExchange')}}" class="form-horizontal" role="form" method="post">
            <div class="form-group">
                <label class="control-label col-sm-2" for="from">From Date :</label>
                <div class="col-sm-2">
                    <input type="date" class="form-control" name="fromDate" id="date" >
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="from">To Date :</label>
                <div class="col-sm-2">
                    <input type="date" class="form-control" name="toDate" id="date" >
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-primary">submit</button>
                    <input type="hidden" name="_token" value="{{Session::token()}}">
                </div>
            </div>
        </form>
        @if($paddyTypes!=null)
        <table class="table table-bordered">
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
                        <?php if($paddyAmounts[$temp]!=0){ ?>
                        <td>{{$riceAmountsTrue[$temp]/$paddyAmounts[$temp]*100}}{{'%'}}</td>
                        <?php } ?>
                    </tr>
                </div>
            @endforeach
            </tbody>
        </table>
@endif
    </section>
@endsection