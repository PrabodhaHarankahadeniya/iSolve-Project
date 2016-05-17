@extends('Layouts.master')

@section('content')

    <section class="row new-post">

        <br>
        <h1 align="center">Rice Mill to Rice Stock</h1>
        <br>
        <h3> Date: {{date("Y.m.d")}}</h3><br>
        <form action="{{route('linkRiceMilltoRiceStock')}}" class="form-horizontal" role="form" method="post">
            <div class="form-group">
                <label class="control-label col-sm-2" for="samba">Samba:</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" name="samba" id="samba" placeholder="Samba Quantity">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="nadu">Nadu:</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" name="nadu" id="nadu" placeholder="Nadu Quantity">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="redSamba">Red Samba:</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" name="redSamba" id="redSamba" placeholder="Red Samba Quantity">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="redNadu">Red Nadu:</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" name="redNadu" id="redNadu" placeholder="Red Nadu Quantity">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="kiriSamba">Kiri Samba:</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" name="kiriSamba" id="kiriSamba" placeholder="Kiri Samba Quantity">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="suvadal">Suvadal:</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" name="suvadal" id="suvadal" placeholder="Suvadal Quantity">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="KekuluSamba">Kekulu Samba:</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" name="KekuluSamba" id="KekuluSamba" placeholder="Kekulu Samba Quantity">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="SuduKekulu">Sudu Kekulu:</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" name="SuduKekulu" id="SuduKekulu" placeholder="Sudu Kekulu Quantity">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="Kekulu">Kekulu:</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" name="Kekulu" id="Kekulu" placeholder="Kekulu Quantity">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="RedKekulu">Red Kekulu:</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" name="RedKekulu" id="RedKekulu" placeholder="Red Kekulu Quantity">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="KekuluKiri">Kekulu Kiri:</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" name="KekuluKiri" id="KekuluKiri" placeholder="Kekulu Kiri Quantity">
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