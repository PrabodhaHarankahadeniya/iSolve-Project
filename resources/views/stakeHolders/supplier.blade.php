@extends('Layouts.master')
@section('style')
    <style>
        h1{
            text-align: center;
            font-family: Times;

        }
        .watermark {
            opacity: 0.3;
            color: BLACK;
            position: absolute;
            bottom: 0;
            right: 0;
        }

    </style>
@section('content')

    <section class="row new-post">

            <br>
            <h1 align="center">Suppliers </h1>

            <br>
        @if($suppliers!=null)
            <table class="table table-bordered" style="width: 60%" align="center" >

                <thead>
                <tr>
                    <th>Name</th>
                    <th>Telephone No</th>
                </tr>
                </thead>
                <tbody>

                @foreach($suppliers as $temp)

                    <div>
                        <tr>
                            <td width="40%">{{$temp->name}}</td>
                            <td width="20%">{{$temp->tele_no}}</td>
                        </tr>

                    </div>
                @endforeach
                </tbody>
            </table>
        @endif
<br><br>
    </section>
    <section>
        <form action="{{route('addSupplier')}}" class="form-horizontal" role="form" method="post">
            <h3>New Supplier form</h3><br>
            <div class="form-group">
                <label class="control-label col-sm-2" for="name">Name :</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="name" id="name" placeholder="Enter name"
                           value="{{Request::old('name')}}" required>
                </div>
            </div>
            <div class="form-group {{$errors->has('Telephone_No') ? 'has-error':''}}">
                <label class="control-label col-sm-2" for="teleNo">Telephone No :</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" name="Telephone_No"  id="teleNo"  placeholder="Enter telephone No."
                           value="{{Request::old('Telephone_No')}}" required>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-primary">submit</button>
                    <input type="hidden" name="_token" value="{{Session::token()}}">

                </div>
            </div>
        </form>


        <div >
            <img class="watermark" width="500px" src="src/img/customer.jpg"/>
        </div>
    </section>


@endsection