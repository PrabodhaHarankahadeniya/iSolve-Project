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



        input{
            border: none;
        }

    </style>
@section('content')

    <section class="row new-post">
        <div class="page-header">
            <h1 align="center">Supplier Delete </h1>
        </div>
        <br><br>

        @if($suppliers!=null)
            <table class="table table-stripprd" style="width: 60%" align="center" >

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
                    <form action="{{route('deleteSupplier')}}" method="post">
                        <div>
                            <tr>
                                <td width="10%">
                                    <input type="text" name="id" id="id" value="{{$temp->id}}" readonly>
                                </td>
                                <td width="40%">{{$temp->name}}</td>
                                <td width="20%">{{$temp->tele_no}}</td>
                                <td width="10%">
                                    <button type="submit" class="btn btn-primary">Remove</button>
                                    <input type="hidden" name="_token" value="{{Session::token()}}">


                                </td>
                            </tr>

                        </div>
                    </form>
                @endforeach
                </tbody>
            </table>
        @endif
        <br><br><br><br><br><br>
    </section>

    {{--<div >--}}
        {{--<img class="watermark" width="500px" src="src/img/customer.jpg"/>--}}
    {{--</div>--}}

@endsection