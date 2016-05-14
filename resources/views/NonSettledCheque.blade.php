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
        <h1> None of the cheques are in not settled state</h1>
    @elseif($cheques[0]->payableStatus==0)
        <br>
        <h1>Recievable Non-Settled  Cheque Report </h1>

    @else
        <br>
        <h1>Payable Non-Settled Cheque Report </h1>

    @endif

        <br><br>

        @if($flag)

            <table class="table table-bordered">
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