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


    @if($purchases!=null and $payableCheques!=null and $orders!=null and $recievableCheques!=null and $salaryAmount!=null)
        <?php
            $totalOrder=0;
            $totalPayableCheque=0;
            $totalRecievableCheque=0;
            $totalPurchase=0;
        ?>
        @if($payableCheques!=null)

        @foreach($payableCheques as $cheque)
            <?php
                $totalPayableCheque+=$cheque->amount;
            ?>
        @endforeach

        @endif

        @if($recievableCheques!=null)

        @foreach($recievableCheques as $cheque)
            <?php
            $totalRecievableCheque+=$cheque->amount;
            ?>
        @endforeach
        @endif


        @if($purchases!=null )

        @foreach($purchases as $purchase)
                <?php
                $totalPurchase+=$purchase->cash_amount;
                ?>
        @endforeach
        @endif

        @if($orders!=null )

        @foreach($orders as $order)
            <?php
            $totalOrder+=$order->cash_amount;
            ?>
        @endforeach
        @endif

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