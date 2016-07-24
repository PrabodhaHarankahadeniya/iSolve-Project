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
        input{
            border: none;

        }
        .submit{
            text-align: center;

        }
        td{
            text-align: center;

        }

    </style>
@endsection
@section('content')

    <section class="row new-post">
        <?php $flag=true;?>


        @if($cheques==NULL)
            <?php $flag=false;?>
            <br><br><br>
            <h1> None of the cheques returned</h1>


        @elseif($cheques[0]->payable_status==0)
            <br>
            <div class="page-header">
                <h1>Recievable Returned Cheque Report </h1>
            </div>
        @else
            <br>
            <div class="page-header">
                <h1>Payable Returned Cheque Report </h1>
            </div>
        @endif

        <br><br>

        @if($flag)

            <table class="table table-bordered">
                <h3 align="right">Date  :  {{date("Y/m/d")}}</h3>
                <br>
                <thead>
                <tr>
                    <th align="center">Cheque No.</th>
                    <th align="center">Bank</th>
                    <th align="center">Branch</th>
                    <th align="center">Due date</th>
                    <th align="center">Amount(Rs.)</th>
                    <th></th>


                </tr>
                </thead>

                <tbody>
                @foreach($cheques as $cheque)

                    <div>
                        <tr>
                            <form action="{{route('linkEditCheque')}}" method="post">
                                <td><input type="text" value="{{$cheque->cheque_no}}" name="chequeNo" readonly></td>
                                <td>{{$cheque->bank}}</td>
                                <td>{{$cheque->branch}}</td>
                                <td>{{$cheque->due_date}}</td>
                                <td align="right">{{$cheque->amount}}</td>
                                <td class="submit">
                                    <button type="submit" class="btn btn-primary">Make Settle</button>
                                    <input type="hidden" name="_token" value="{{Session::token()}}">

                                </td>

                            </form>
                        </tr>


                    </div>
                @endforeach
                </tbody>
            </table><br><br>

    </section>

    @endif
    <div >
        <img class="watermark" width="500px" src="src/img/finance.jpg"/>
    </div>
    </section>
@endsection