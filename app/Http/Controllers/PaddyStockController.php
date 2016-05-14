<?php
namespace App\Http\Controllers;

use Faker\Provider\DateTime;
use DB;
use App\Paddy;
use App\RiceMill;
use App\PaddyStock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaddyStockcontroller extends controller
{
    public function getPaddy(Request $request){
        //validation
        $type="Samba";
        $quantity=$request['samba'];
        $paddy=new Paddy();
        $paddy->Type= $type;
        $paddy->QuantityinKg=$quantity;
        array_add(PaddyStock::getPaddyList(),"samba",$paddy);
        $paddy=\DB::table('paddystock')->get();
        foreach ($paddy as $p) {
            DB::table('paddystock')
                ->where('type', "Samba")
                ->update(['QuantityinKg' => $p->QuantityinKg-$quantity]);
        }
        return view('PaddyStocktoRiceMill');
    }

}