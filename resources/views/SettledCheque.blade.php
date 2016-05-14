@extends('Layouts.master')
@section('style')
    <style>
        h1{

            text-align: center;
            font-family: Times;
        }


    </style>
@endsection

@section('content')

    <section class="row new-post">
        <?php $flag=true;?>


        @if($cheques==NULL)
            <?php $flag=false;?>
            <br><br><br>
            <h1> None of the cheques settled</h1>


        @elseif($cheques[0]->payable_status==0)
            <br>
            <h1>Recievable Settled Cheque Report </h1>

        @else
            <br>
            <h1>Payable Settled Cheque Report </h1>

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

                                <td>{{$cheque->cheque_no}}</td>
                                <td>{{$cheque->bank}}</td>
                                <td>{{$cheque->branch}}</td>
                                <td>{{$cheque->date}}</td>
                                <td align="right">{{$cheque->amount}}</td>


                        </tr>


                    </div>
                @endforeach
                </tbody>
            </table><br><br>

    </section>

    @endif
    </section>
@endsection