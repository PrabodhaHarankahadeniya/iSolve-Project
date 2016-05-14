<?php
namespace App\Http\Controllers;

use Faker\Provider\DateTime;
use DB;
use App\Rice;
use App\RiceMill;
use App\RiceStock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RiceStockcontroller extends controller
{
    public function createRice(Request $request){
        //validation
        $type="Samba";
        $quantity=$request['samba'];
        $rice=new Rice();
        $rice->Type= $type;
        $rice->QuantityinKg=$quantity;
        array_add(RiceStock::getRiceList(),"samba",$rice);
        $rice=\DB::table('rice')->get();
        foreach ($rice as $r) {
            DB::table('rice')
                ->where('type', "Samba")
                ->update(['QuantityinKg' => $quantity+$r->QuantityinKg]);
        }
        return view('PaddyStocktoRiceMill');
    }

}