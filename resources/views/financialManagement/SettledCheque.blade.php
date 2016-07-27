@extends('Layouts.master')
@section('style')
    <style>
        h1{

            text-align: center;
            font-family: Times;
        }

        .watermark {
            opacity: 0.2;
            color: BLACK;
            position: absolute;
            top: 10%;
            left: 30%;
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
        <?php $flag=true;?>


        @if($cheques==NULL)
            <?php $flag=false;?>
            <br><br><br>
            <h1> None of the cheques settled</h1>


        @elseif($cheques[0]->payable_status==0)
            <div class="page-header">
                <h1>Recievable Settled Cheque Report </h1>
            </div>
        @else
            <div class="page-header">
                <h1>Payable Settled Cheque Report </h1>
            </div>
        @endif



        @if($flag)

            <table class="table table-stripped">
                <h3 align="right">Date  :  {{date("Y/m/d")}}</h3>
                <br>
                <thead>
                <tr>
                    <th align="center">Cheque No.</th>
                    <th align="center">Bank</th>
                    <th align="center">Branch</th>
                    <th align="center">Due date</th>
                    <th align="center">Amount(Rs.)</th>



                </tr>
                </thead>

                <tbody>
                @foreach($cheques as $cheque)

                    <div>
                        <tr <?php if($cheque->returned_status==0){ ?> class ="success" <?php }else{ ?> class="danger" <?php } ?>>

                                <td>{{$cheque->cheque_no}}</td>
                                <td>{{$cheque->bank}}</td>
                                <td>{{$cheque->branch}}</td>
                                <td>{{$cheque->due_date}}</td>
                                <td>{{$cheque->amount}}</td>


                        </tr>


                    </div>
                @endforeach
                </tbody>
            </table><br><br><br><br><br>

    </section>

    @endif
    <div >
        <img class="watermark" width="500px" src="src/img/finance.jpg"/>
    </div>
    </section>
@endsection