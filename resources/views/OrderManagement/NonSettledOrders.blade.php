@extends('Layouts.master')
@section('content')
    <h2>Paddy Purchase Invoice</h2>
    <br>
    <div class="col-md-10 col-md-offset-1">
        <table class="table table-hover">
            <?php
            foreach ($nonSettledOrders as $order){
            $cheques = $order->cheques;
            $chequeAmount = 0;
            ?>
            <tr class="warning">
                <td>{{$order->date}}</td>
                <td>{{$order->id}}</td>
                <?php if ($order->is_rice){
                    $description = "A Rice Order";
                }
                else{
                    $description = "A Flour Order";
                }
                ?>
                <td>{{$description}}</td>
                <td>{{$order->total_amount}}</td>
                <td>{{$order->cash_amount}}</td>
                <?php
                if ($cheques == null){
                    $chequeAmount = 0;
                }
                else{
                    foreach ($cheques as $cheque){
                        $chequeAmount += $cheque->cheque_amount;
                    }
                }
                ?>
                <td>{{$chequeAmount}}</td>
            </tr>
            <?php
            }
            ?>
        </table>
    </div>

@endsection