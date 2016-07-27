@extends('Layouts.master')
@section('content')
    <h2>Settled Orders</h2>
    <br>
    <div class="col-md-10 col-md-offset-1">
        <table class="table table-hover">
            <tr>
                <th>Date</th>
                <th>Order ID</th>
                <th>Type</th>
                <th>Total Amount</th>
                <th>Amount Settled By Cash</th>
                <th>Amount Settled By Cheques</th>
                <th>Total Amount Paid</th>
                <th></th>
            </tr>
            <?php
            foreach ($settledOrders as $order){
                $cheques = $order->cheques;
                $chequeAmount = 0;
            ?>
            <tr class="success" onclick="document.location ='http://localhost:8000/orderManagement/showSettledOrders/{{$order->id}}'" >
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
                <td>{{$order->total_price}}</td>
                <td>{{$order->cash_amount}}</td>
                <?php
                if ($cheques == null){
                    $chequeAmount = 0;
                }
                else{
                    foreach ($cheques as $cheque){
                        $chequeAmount += $cheque->amount;
                    }
                }
                ?>
                <td>{{$chequeAmount}}</td>
                <td>{{$order->cash_amount + $chequeAmount}}</td>
            </tr>
            <?php
            }
            ?>
        </table>
    </div>

@endsection