<?php
namespace App\Http\Controllers;

use App\Rice;
use App\RiceMill;
use App\RiceStock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RiceStockcontroller extends controller
{
public function createRice(Request $request){
    //validation
    $rice=new Rice();
    $rice->Type="Samba";
    $rice->QuantityinKg=$request['samba'];
    array_add(RiceStock::getRiceList(),"samba",$rice);
    $rice=\DB::table('rice')->get();
    foreach ($rice as $r) {
        if ($r->Type==="Samba") {
            $r->QuantityinKg=$r->QuantityinKg+$request['samba'];
        }

    }
    //$request->ricestock()->rice()->save($rice);
    return view('PaddyStocktoRiceMill');
}
}