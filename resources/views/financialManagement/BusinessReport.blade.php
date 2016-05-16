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

        <br>
        <h1>Business Report </h1>
        <br>

        <form action="{{route('submitDate')}}" class="form-horizontal" role="form" method="post">

            <div class="form-group">
                <label class="control-label col-sm-2" for="from">From :</label>
                <div class="col-sm-2">
                    <input type="date" class="form-control" name="from" id="from" >
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="to">To :</label>
                <div class="col-sm-2">
                    <input type="date" class="form-control" name="to" id="to">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-primary">submit</button>
                    <input type="hidden" name="_token" value="{{Session::token()}}">

                </div>
            </div>
        </form>
    @if($purchases!=null and $payableCheques!=null and $recievableCheques!=null and $salaryAmount!=null)
        <?php $totalPayableCheque=0; ?>
        @foreach($payableCheques as $cheque)
            <?php
                $totalPayableCheque+=$cheque->amount;
            ?>
        @endforeach

        <?php $totalRecievableCheque=0; ?>
        @foreach($recievableCheques as $cheque)
            <?php
            $totalRecievableCheque+=$cheque->amount;
            ?>
        @endforeach

        <?php $totalPurchase=0; ?>
        @foreach($purchases as $purchase)
                <?php
                $totalPurchase+=$purchase->cash_amount;
                ?>
        @endforeach

        <?php $totalOrder=0; ?>
        @foreach($orders as $order)
            <?php
            $totalOrder+=$order->cash_amount;
            ?>
        @endforeach

        <?php
            $totalIncome=$totalRecievableCheque+$totalOrder;
            $totalExpenditure=$totalCheque+$totalPurchase+$salaryAmount[0];


        ?>
        <h3>Expenditures</h3>
        <table>
            <tbody>
            <tr>
            <td colspan="4">Purchases</td>
            <tr>

            <tr>
                <td>Purchase id</td>
                <td>Purchase date</td>
                <td>Purchase item</td>
                <td>Cash amount</td>


            </tr>
            @foreach($purchases as $purchase)
                <tr>
                    <td>{{$purchase->id}}</td>
                    <td>{{$purchase->date}}</td>
                    <td>{{$purchase->purchase_item}}</td>
                    <td class="amount">{{$purchase->cash_amount}}</td>


                </tr>


            @endforeach
            <tr>
                <td colspan="3">Total Amount</td>
                <td class="amount">{{$totalPurchase}}</td>

            </tr>


            <tr><td colspan="4"></td></tr>
            <tr>
                <td colspan="4">Payable Cheques</td>
            <tr>

            <tr>
                <td>Cheque No</td>
                <td>Bank</td>
                <td>Branch</td>
                <td>Amount</td>


            </tr>
            @foreach($payableCheques as $cheque)
                <tr>
                    <td>{{$cheque->cheque_no}}</td>
                    <td>{{$cheque->bank}}</td>
                    <td>{{$cheque->branch}}</td>
                    <td class="amount">{{$cheque->amount}}</td>


                </tr>


            @endforeach
            <tr>
                <td colspan="3">Total Amount</td>
                <td class="amount">{{$totalPayableCheque}}</td>

            </tr>

            <tr><td colspan="4"> </td></tr>
            <tr><td colspan="4"> Salories of Employees</td></tr>
            <tr>
                <td colspan="3">Amount</td>
                <td class="amount">{{$salaryAmount[0]}}</td>

            </tr>
            <tr>
                <td colspan="3">Total amount of expenditure</td>
                <td class="amount">{{$totalExpenditure}}</td>

            </tr>
            </tbody>






        </table>
            <h3>Income</h3>
            <table>
                <tbody>
                <tr>
                    <td colspan="4">Orders</td>
                <tr>

                <tr>
                    <td>Order id</td>
                    <td>Order date</td>
                    <td>Order item</td>
                    <td>Cash amount</td>


                </tr>
                @foreach($orders as $order)
                    <tr>
                        <td>{{$order->id}}</td>
                        <td>{{$order->date}}</td>
                        <td>{{$order->purchase_item}}</td>
                        <td class="amount">{{$order->cash_amount}}</td>


                    </tr>


                @endforeach
                <tr>
                    <td colspan="3">Total Amount</td>
                    <td class="amount">{{$totalOrder}}</td>

                </tr>


                <tr><td colspan="4"></td></tr>
                <tr>
                    <td colspan="4">Recievable Cheques</td>
                <tr>

                <tr>
                    <td>Cheque No</td>
                    <td>Bank</td>
                    <td>Branch</td>
                    <td>Amount</td>


                </tr>
                @foreach($recievableCheques as $cheque)
                    <tr>
                        <td>{{$cheque->cheque_no}}</td>
                        <td>{{$cheque->bank}}</td>
                        <td>{{$cheque->branch}}</td>
                        <td class="amount">{{$cheque->amount}}</td>


                    </tr>


                @endforeach
                <tr>
                    <td colspan="3">Total Amount</td>
                    <td class="amount">{{$totalRecievableCheque}}</td>

                </tr>

                <tr><td colspan="4"> </td></tr>

                <tr>
                    <td colspan="3">Total amount of income</td>
                    <td class="amount">{{$totalIncome}}</td>

                </tr>
                </tbody>






            </table>



    @endif
        <form>

        </form>
    </section>
@endsection