@extends('Layouts.master')

@section('content')
    <section class="row new-post">

        <br>
        <h1>Paddy Rice Stock Exchange</h1>
        <br><br>
        <form action="{{route('PaddyRiceStockExchange')}}" class="form-horizontal" role="form" method="post">
            <div class="form-group">
                <label class="control-label col-sm-2" for="from">Date :</label>
                <div class="col-sm-2">
                    <input type="date" class="form-control" name="fromDate" id="date" >
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="from">Date :</label>
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
        <table class="table table-bordered">
            <thead>
            <tr>
                <th align="center">Paddy to Mill</th>
                <th align="center">Rice from Mill</th>
            </tr>
            </thead>
            <tbody>

            @foreach($paddyEntries as $temp)

                <div>
                    <tr>
                        <td>{{$temp->type}}</td>
                        <td>{{$temp->quantity_in_kg}}</td>
                    </tr>

                </div>
            @endforeach
            @foreach($RiceEntries as $temp)

                <div>
                    <tr>
                        <td>{{$temp->type}}</td>
                        <td>{{$temp->quantity_in_kg}}</td>
                    </tr>

                </div>
            @endforeach
            <h3>Rice stock was last updated in  :  {{$temp->updated_at}}</h3><br>
            </tbody>
        </table>

    </section>
@endsection