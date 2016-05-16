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
    @if($purchases!=null and $cheques!=null)
        <?php $totalCheque=0; ?>
        @foreach($cheques as $cheque)
            <?php
                $totalCheque+=$cheque->amount;
            ?>
        @endforeach


        <?php $totalPurchases=0; ?>
        @foreach($purchases as $purchase)
                <?php
                $totalPurchases+=$purchase->cash_amount;
                ?>
        @endforeach




    @endif
        <form>

        </form>
    </section>
@endsection