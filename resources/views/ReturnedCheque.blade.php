@extends('Layouts.master')
@section('style')
    <style>
        h1{

            text-align: center;
            font-family: Times;
        }

    </style>
@section('content')

    <section class="row new-post">
        <?php $flag=false;?>
        @if($cheques==NULL)
<br><br><br>
            <h1> None of the cheques are returned</h1>
        @endif
        @if($cheques[0]->payableStatus==0)
            <br>
                <?php $flag=true;?>
            <h1> Recievable Returned Cheque Report </h1>
        @endif
        @if($cheques[0]->payableStatus==1)
            <br>
                <?php $flag=true;?>
            <h1>Payable Returned Cheque Report </h1>

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


                    </tr>
                    </thead>

                    <tbody>

                    @foreach($cheques as $cheque)
                        <div>
                            <tr>
                                <td>{{$cheque->chequeNo}}</td>
                                <td>{{$cheque->bank}}</td>
                                <td>{{$cheque->branch}}</td>
                                <td>{{$cheque->date}}</td>
                                <td align="right">{{$cheque->amount}}</td>


                            </tr>


                        </div>
                    @endforeach

                    </tbody>
                </table>

        @endif
    </section>
@endsection