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
            <h1 align="center">Customer Delete</h1>

        </div>
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
                            <form action="{{route('deleteCustomer')}}" method="post">
                                <td width="10%">
                                    <input type="text" name="id" id="id" value="{{$temp->id}}" readonly>

                                </td>
                                <td width="30%">{{$temp->name}}</td>
                                <td width="30%">{{$temp->name_of_shop}}</td>
                                <td width="10%">{{$temp->tele_no}}</td>
                                <td width="10%">
                                    <button type="submit" class="btn btn-primary">Remove</button>
                                    <input type="hidden" name="_token" value="{{Session::token()}}">

                                </td>
                            </form>
                        </tr>
                    </div>
                @endforeach
                </tbody>
            </table><br><br><br><br><br><br>
        @endif

        {{--<div >--}}
            {{--<img class="watermark" width="500px" src="src/img/customer.jpg"/>--}}
        {{--</div>--}}
    </section>
@endsection