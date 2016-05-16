@extends('Layouts.master')



@section('content')

    <section class="row new-post">
        <br>
        <h1 align="center">Add Paddy to Stock</h1>
        <br>
        <h3>Date  :  {{date("Y/m/d")}}</h3><br>
        <form action="{{route('linkaddPaddy')}}" class="form-horizontal" role="form" method="post">
            <div class="form-group">
                <label class="control-label col-sm-2" for="samba">Samba:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="Samba" id="samba" placeholder="Samba Quantity">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="nadu">Nadu:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="Nadu" id="nadu" placeholder="Nadu Quantity">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="redSamba">Red Samba:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="RedSamba" id="redSamba" placeholder="Red Samba Quantity">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="redNadu">Red Nadu:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="RedNadu" id="redNadu" placeholder="Red Nadu Quantity">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="kiriSamba">Kiri Samba:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="KiriSamba" id="kiriSamba" placeholder="Kiri Samba Quantity">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="suvadal">Suvadal:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="Suvadal" id="suvadal" placeholder="Suvadal Quantity">
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