@extends('Layouts.master')



@section('content')

    <section class="row new-post">
        <br>
        <h1 align="center">Flour Mill to Flour Stock</h1>
        <br>
        @if($errors!=null)
            @foreach($errors as $error)
                <div class="alert alert-warning" role="alert">
                    {{$error}}
                </div>
            @endforeach
        @endif
        <form action="{{route('linkFlourMilltoFlourStock')}}" class="form-horizontal" role="form" method="post">
            <div class="form-group">
                <label class="control-label col-sm-2" for="from">Date :</label>
                <div class="col-sm-2">
                    <input type="date" class="form-control" name="date" id="date" >
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="WhiteRiceFlour">White Rice Flour:</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" name="WhiteRiceFlour" id="WhiteRiceFlour" placeholder="White Rice Flour Quantity">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="RedKekuluFlour">Red Kekulu Flour:</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" name="RedKekuluFlour" id="RedKekuluFlour" placeholder="Red Kekulu Flour Quantity">
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