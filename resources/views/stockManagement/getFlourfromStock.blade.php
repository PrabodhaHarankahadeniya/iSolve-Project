@extends('Layouts.master')



@section('content')

    <section class="row new-post">
        <br>
        <h1 align="center">Get Flour from Stock</h1>
        <br>
        <h3>Date  :  {{date("Y/m/d")}}</h3><br>
        <form action="{{route('linkGetFlour')}}" class="form-horizontal" role="form" method="post">
            <div class="form-group">
                <label class="control-label col-sm-2" for="WhiteRiceFloor">White Rice Floor:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="WhiteRiceFloor" id="WhiteRiceFloor" placeholder="White Rice Floor Quantity">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="RedKekuluFloor:">Red Kekulu Floor:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="RedKekuluFloor" id="RedKekuluFloor" placeholder="Red Kekulu Floor Quantity">
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
@endsection