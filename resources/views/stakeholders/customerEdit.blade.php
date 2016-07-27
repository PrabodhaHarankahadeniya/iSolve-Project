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
@endsection

@section('header')
    <?php $users = \App\User::all();?>
    @foreach($users as $user)

        @if($user->username=="admin" and $user->user_type=="currentUser")
            @include('includes.header')
        @elseif($user->username=="clerk" and $user->user_type=="currentUser")
            @include('includes.headerClerk')

        @endif
    @endforeach
@endsection

@section('content')

    <section class="row new-post">

        <div class="page-header">
            <h1 align="center">Customer Edit Form </h1>
        </div><br>


        <form action="{{route('editCustomer')}}" class="form-horizontal" role="form" method="post">
            <div class="form-group">
                <label class="control-label col-sm-2" for="id">Customer Id :</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="id" id="id"
                           value="{{$customer[0]->id}}" readonly>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="name">Name of the customer :</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="name" id="name" placeholder="Enter name"
                           value="{{$customer[0]->name}}" required>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for=">nameOfShop">Name Of Shop :</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="nameOfShop" id="nameOfShop" placeholder="Enter name of the shop"
                           value="{{$customer[0]->name_of_shop}}" required>
                </div>
            </div>
            <div class="form-group {{$errors->has('Telephone_No') ? 'has-error':''}}">
                <label class="control-label col-sm-2" for="teleNo">Telephone No :</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="Telephone_No" id="teleNo" placeholder="Enter telephone No"
                           value="{{$customer[0]->tele_no}}" maxlength="10" minlength="10" required>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-primary">Save changes</button>
                    <input type="hidden" name="_token" value="{{Session::token()}}">

                </div>
            </div>

        </form>
<hr>
        <br><br>
        @if($customers!=null)
            <table class="table table-stripped" style="width: 70%" align="center" >
                <thead>
                <tr>
                    <th>Customer id</th>
                    <th align="center">Name</th>
                    <th align="center">NameofShop</th>
                    <th align="center">TeleNo</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>

                @foreach($customers as $temp)

                    <div>
                        <tr>
                            <form action="{{route('linkEditCustomer')}}" method="post">
                                <td width="10%">
                                    <input type="text" name="id" id="id" value="{{$temp->id}}" readonly>

                                </td>
                                <td width="30%">{{$temp->name}}</td>
                                <td width="30%">{{$temp->name_of_shop}}</td>
                                <td width="10%">{{$temp->tele_no}}</td>
                                <td width="10%">
                                    <button type="submit" class="btn btn-primary">Edit</button>
                                    <input type="hidden" name="_token" value="{{Session::token()}}">

                                </td>
                            </form>
                        </tr>

                    </div>
                @endforeach
                </tbody>
            </table><br><br>
        @endif

        {{--<div >--}}
            {{--<img class="watermark" width="500px" src="src/img/customer.jpg"/>--}}
        {{--</div>--}}
    </section>
@endsection