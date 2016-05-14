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
        $sambaQuantity=$request['samba'];
        $type="Nadu";
        $naduQuantity=$request['nadu'];
        $type="RedSamba";
        $sambaQuantity=$request['redSamba'];
        $type="RedNadu";
        $sambaQuantity=$request['redNadu'];
        $type="KiriSamba";
        $sambaQuantity=$request['kiriSamba'];
        $type="Suvadal";
        $sambaQuantity=$request['suvadal'];
        $paddy=new Paddy();
        $paddy->Type= $type;
        $paddy->QuantityinKg=$sambaQuantity;
        array_add(PaddyStock::getPaddyList(),"samba",$paddy);
        $paddy=\DB::table('paddystock')->get();
        foreach ($paddy as $p) {
            DB::table('paddystock')
                ->where('type', "Samba")
                ->update(['QuantityinKg' => $p->QuantityinKg-$sambaQuantity]);
            DB::table('paddystock')
                ->where('type', "Samba")
                ->update(['QuantityinKg' => $p->QuantityinKg-$sambaQuantity]);
            DB::table('paddystock')
                ->where('type', "Samba")
                ->update(['QuantityinKg' => $p->QuantityinKg-$sambaQuantity]);
            DB::table('paddystock')
                ->where('type', "Samba")
                ->update(['QuantityinKg' => $p->QuantityinKg-$sambaQuantity]);DB::table('paddystock')
                ->where('type', "Samba")
                ->update(['QuantityinKg' => $p->QuantityinKg-$sambaQuantity]);DB::table('paddystock')
                ->where('type', "Samba")
                ->update(['QuantityinKg' => $p->QuantityinKg-$sambaQuantity]);
        }
        return view('PaddyStocktoRiceMill');
    }

}