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
                            <td>{{$cheque->chequeNo}}</td>
                            <td>{{$cheque->bank}}</td>
                            <td>{{$cheque->branch}}</td>
                            <td>{{$cheque->date}}</td>
                            <td align="right">{{$cheque->amount}}</td>
                            <td><button type="submit" class="btn btn-primary">Make Settle</button></th>


                        </tr>


                    </div>
                @endforeach
                </tbody>
            </table><br><br>
                <div class="btn-group" role="group" align="center">

                    <a href="{{route('editNonSettled')}}"><button class="btn btn-primary ">Edit</button></a><br>
                </div>
    </section>

    @endif
    </section>
@endsection