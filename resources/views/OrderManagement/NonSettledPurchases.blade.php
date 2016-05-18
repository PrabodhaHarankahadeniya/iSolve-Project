@extends('Layouts.master')
@section('content')
    <h2>Paddy Purchase Invoice</h2>
    <br>
    <div class="col-md-10 col-md-offset-1">
        <table class="table table-hover">
            <?php
            foreach ($nonSettledPurchases as $purchase){
            $cheques = $purchase->cheques;
            $chequeAmount = 0;
            ?>
            <tr class="warning" onclick="document.location = '/iSolve-Project/public/orderManagement/showNonSettledPurchases/{{$purchase->id}}'" >
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
                <td>{{$purchase->total_amount}}</td>
                <td>{{$purchase->cash_amount}}</td>
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