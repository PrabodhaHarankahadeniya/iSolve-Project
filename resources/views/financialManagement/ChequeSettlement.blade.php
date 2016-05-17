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
    <section>
        <form action="{{route('editCheque')}}" class="form-horizontal" role="form" method="post">
            <h3>Make Settle</h3><br>
            <div class="form-group">
                <label class="control-label col-sm-2" for="chequeNo">Cheque No :</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="chequeNo" id="chequeNo" value="{{$cheque[0]->cheque_no}}" readonly>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="bank">Bank :</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="bank"  id="bank" value="{{$cheque[0]->bank}}" readonly>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="branch">Branch :</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="branch"  id="branch" value="{{$cheque[0]->branch}}"readonly>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="dueDate">Due date :</label>
                <div class="col-sm-10">
                    <input type="date" class="form-control" name="dueDate"  id="dueDate" value="{{$cheque[0]->due_date}}"readonly>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="amount">Amount :</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" name="amount"  id="amount" value="{{$cheque[0]->amount}}"readonly>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="settledDate">Settled date :</label>
                <div class="col-sm-10">
                    <input type="date" class="form-control" name="settledDate"  id="settledDate" >
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-primary">submit</button>
                    <input type="hidden" name="_token" value="{{Session::token()}}">

                </div>
            </div>
        </form>



    </section>
@endsection