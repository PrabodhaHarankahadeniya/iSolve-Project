@extends('Layouts.master')
@section('content')
    <h2>Settled Purchases</h2>
    <br>
    <div class="col-md-12 col-md-offset-1">
        <table class="table table-hover">
            <tr>
                <th>Date</th>
                <th>Purchase ID</th>
                <th>Type</th>
                <th>Total Amount</th>
                <th>Amount Settled By Cash</th>
                <th>Amount Settled By Cheques</th>
                <th>Total Amount Paid</th>

            </tr>
            <?php
                foreach ($settledPurchases as $purchase){
                    $cheques = $purchase->cheques;
                    $chequeAmount = 0;
            ?>
            <tr class="success" onclick="document.location = '/iSolve-Project/public/orderManagement/showSettledPurchases/{{$purchase->id}}'" >
                <td>{{$purchase->date}}</td>
                <td>{{$purchase->id}}</td>
                <?php if ($purchase->is_paddy){
                    $description = "A Paddy Purchase";
                }
                    else{
                        $description = "A Rice Purchase";
                    }
                ?>
                <td>{{$description}}</td>
                <td>{{$purchase->total_price}}</td>
                <td>{{$purchase->cash_amount}}</td>
                <?php $cheques = \App\Cheque::all();
                $cheque=null;
                $chequeAmount = 0;
                foreach ($cheques as $i){
                    if ($purchase->id == $i->purchase_id){
                        $cheque=$i;
                        break;
                    }
                }?>  <?php
                if ($cheque == null){
                    $chequeAmount = 0;
                }
                else{
                    $chequeAmount += $cheque->amount;

                }
                ?>
                <td>{{$chequeAmount}}</td>
                <td>{{$purchase->cash_amount + $chequeAmount}}</td>
            </tr>
            <?php
                }
            ?>
        </table>
    </div>

@endsection