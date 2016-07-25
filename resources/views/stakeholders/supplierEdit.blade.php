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

        td{
            text-align: center;
        }

        input{
            border: none;
        }
    </style>
@section('content')

    <section class="row new-post">

    <div class="page-header">
        <h1 align="center">Supplier Edit </h1>
    </div>
<br><br>
        @if($suppliers!=null)
            <table class="table table-bordered" style="width: 60%" align="center" >

                <thead>
                <tr>
                    <th>Supplier id</th>
                    <th>Name</th>
                    <th>Telephone No</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>

                @foreach($suppliers as $temp)
                    <form action="{{route('linkEditSupplier')}}" method="post">
                        <div>
                            <tr>
                                <td width="10%">
                                    <input type="text" name="id" id="id" value="{{$temp->id}}" readonly>
                                </td>
                                <td width="40%">{{$temp->name}}</td>
                                <td width="20%">{{$temp->tele_no}}</td>
                                <td width="10%">
                                    <button type="submit" class="btn btn-primary">Edit</button>
                                    <input type="hidden" name="_token" value="{{Session::token()}}">


                                </td>
                            </tr>

                        </div>
                    </form>
                @endforeach
                </tbody>
            </table>
        @endif
        <br><br>
    </section>
    <section>
        <form action="{{route('editSupplier')}}" class="form-horizontal" role="form" method="post">
            <h3>New Supplier form</h3><br>
            <div class="form-group">
                <label class="control-label col-sm-2" for="id">Id :</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="id" id="id"
                           value="{{$supplier[0]->id}}" readonly>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="name">Name :</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="name" id="name" placeholder="Enter name"
                           value="{{$supplier[0]->name}}" required>
                </div>
            </div>
            <div class="form-group {{$errors->has('Telephone_No') ? 'has-error':''}}">
                <label class="control-label col-sm-2" for="teleNo">Telephone No :</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="Telephone_No"  id="teleNo"  placeholder="Enter telephone No."
                           value="{{$supplier[0]->tele_no}}" maxlength="10" minlength="10" required>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-primary">Save changes</button>
                    <input type="hidden" name="_token" value="{{Session::token()}}">

                </div>
            </div>
        </form>


        {{--<div >--}}
            {{--<img class="watermark" width="500px" src="src/img/customer.jpg"/>--}}
        {{--</div>--}}
    </section>


@endsection