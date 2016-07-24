@extends('Layouts.master')
@section('style')
    <style>
        h1{

            text-align: center;
            font-family: Times;
        }
        td{
            text-align: center;

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

@section('content')

    <section class="row new-post">
        <?php $flag=true;?>


        @if($cheques==NULL)
            <?php $flag=false;?>
            <br><br><br>
            <h1> None of the cheques settled</h1>


        @elseif($cheques[0]->payable_status==0)
            <br>
            <div class="page-header">
                <h1>Recievable Settled Cheque Report </h1>
            </div>
        @else
            <br>
            <div class="page-header">
                <h1>Payable Settled Cheque Report </h1>
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



                </tr>
                </thead>

                <tbody>
                @foreach($cheques as $cheque)

                    <div>
                        <tr <?php if($cheque->returned_status==0){ ?> class ="success" <?php }else{ ?> class="warning" <?php } ?>>

                                <td>{{$cheque->cheque_no}}</td>
                                <td>{{$cheque->bank}}</td>
                                <td>{{$cheque->branch}}</td>
                                <td>{{$cheque->due_date}}</td>
                                <td align="right">{{$cheque->amount}}</td>


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