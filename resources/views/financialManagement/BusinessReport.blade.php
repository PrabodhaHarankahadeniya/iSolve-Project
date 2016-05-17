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

    <?php
        $purchases=$details[0];
        $orders=$details[1];
        $payableCheques=$details[2];
        $recievableCheques=$details[3];
        $salaryAmount=$details[4];


    ?>
    @if($purchases!=null or $payableCheques!=null or $orders!=null or $recievableCheques!=null or $salaryAmount!=null)
        <?php
            $totalOrder=0;
            $totalPayableCheque=0;
            $totalRecievableCheque=0;
            $totalPurchase=0;
            $totalExpenditure=0;
            $totalIncome=0;
        ?>

        <h3>Expenditures</h3>

            <table class="table table-bordered">
                <tbody>


        {{--purchases--}}


                    @if($purchases!=null)
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

                            <?php
                            $totalPurchase+=$purchase->cash_amount;
                            ?>
                        @endforeach
                        <tr>
                            <td colspan="3">Total Amount</td>
                            <td class="amount">{{$totalPurchase}}</td>

                        </tr>

                    @endif


    {{--payable cheques--}}
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
                        <?php
                        $totalPayableCheque+=$cheque->amount;
                        ?>

                    @endforeach
                    <tr>
                        <td colspan="3">Total Amount</td>
                        <td class="amount">{{$totalPayableCheque}}</td>

                    </tr>

        {{--employee salary--}}



                    <tr><td colspan="4"> </td></tr>
                    <tr><td colspan="4"> Salories of Employees</td></tr>
                    <tr>
                        <td colspan="3">Amount</td>
                        <td class="amount">{{$salaryAmount[0]}}</td>

                    </tr>


        {{--total expenditure--}}


                    <?php $totalExpenditure=$totalPayableCheque+$totalPurchase+$salaryAmount[0];?>
                    <tr>
                        <td colspan="3">Total amount of expenditure</td>
                        <td class="amount">{{$totalExpenditure}}</td>

                    </tr>
                </tbody>






            </table>


            {{--Income--}}

            <h3>Income</h3>
            <table class="table table-bordered">
                <tbody>

            {{--orders--}}

                @if($orders!=null)
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
                        <?php
                        $totalOrder+=$order->cash_amount;
                        ?>

                    @endforeach

                    <tr>
                        <td colspan="3">Total Amount</td>
                        <td class="amount">{{$totalOrder}}</td>

                    </tr>

                @endif
                <tr><td colspan="4"></td></tr>

            {{--recievalbe cheque--}}


                @if($recievableCheques!=null)
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
                        <?php
                        $totalRecievableCheque+=$cheque->amount;
                        ?>

                    @endforeach
                    <tr>
                        <td colspan="3">Total Amount</td>
                        <td class="amount">{{$totalRecievableCheque}}</td>

                    </tr>
                @endif

                <tr><td colspan="4"> </td></tr>

{{--total income--}}

                <?php $totalIncome=$totalRecievableCheque+$totalOrder;?>
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