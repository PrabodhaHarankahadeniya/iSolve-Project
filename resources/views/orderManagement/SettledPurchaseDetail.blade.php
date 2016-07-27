@extends('Layouts.master')


@section('style')
    <style>
        h1{
            text-align: center;
            font-family: Times;

        }
input{
    border:none;
}
    </style>

@endsection

@section('header')
    <?php $users = \App\User::all();?>
    @foreach($users as $user)

        @if($user->username=="admin" and $user->user_type=="currentUser")
            @include('includes.header')
        @elseif($user->username=="clerk" and $user->user_type=="currentUser")
            @include('includes.headerClerk')

        @endif
    @endforeach
@endsection

@section('content')

    <section class="row new-post">

        <div class="page-header">
        <h1>Settled Purchase Detail Report </h1>
        </div>
<br><br>

        <table class="table  table-bordered">
<body>
        <tr>
            <td>Purchase ID : </td>
            <td><input value="{{$purchase->id}}"></td>
        </tr>
        <?php $suppliers = \App\Supplier::all();
        $name=null;
        foreach ($suppliers as $supplier){
            if ($supplier->id == $purchase->supplier_id){
                $name=$supplier->name;
            }
        }?>

        <tr>
            <td>Supplier name :</td>
            {{--supplier name should be add--}}
            <td><input value="{{$name}}"></td>
        </tr>
        <tr>
            <td>Date :</td>
            <td><input value="{{$purchase->date}}"></td>
        </tr>
        <tr>
            <td>Purchase item :</td>
            <td><input value="{{$purchase->purchase_item}}"></td>
        </tr>
        <tr>
            <td>Cash amount :</td>
            <td><input value="{{$purchase->cash_amount}}"></td>
        </tr><br>
        <?php $cheques = \App\Cheque::all();
        $cheque=null;
        $chequeAmount = 0;
        foreach ($cheques as $i){
            if ($purchase->id == $i->purchase_id){
                $cheque=$i;
                break;
            }
        }
        if ($cheque == null){
            $chequeAmount = 0;
        }
        else{
            $chequeAmount= $chequeAmount+$cheque->amount;

        }
        ?>
        <tr>
            <td>Cheque amount :</td>
            {{--cheque amount shoul be calculated--}}
            <td><input value="{{$chequeAmount}}"></td>
        </tr>
        <tr>
            <td>Toatal Amount:</td>
            <td><input value="{{$purchase->total_price}}"></td>
        </tr>
</body>
        </table>
    </section>
@endsection