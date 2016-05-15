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
        $temp=$sambaQuantity/5;
        for($i=0;$i<$temp;$i=$i+1){
            $paddy=new Paddy();
            $paddy->Type= $type;
            $paddy->QuantityinKg=5;
            array_add(PaddyStock::getPaddyList(),"samba",$paddy);
            echo "$paddy->get";
        }
        $type="Nadu";
        $naduQuantity=$request['nadu'];
        $temp=$naduQuantity/5;
        for($i=0;$i<$temp;$i=$i+1){
            $paddy=new Paddy();
            $paddy->Type= $type;
            $paddy->QuantityinKg=5;
            array_add(PaddyStock::getPaddyList(),"samba",$paddy);
        }
        $type="RedSamba";
        $redSambaQuantity=$request['redSamba'];
        $type="RedNadu";
        $redNaduQuantity=$request['redNadu'];
        $type="KiriSamba";
        $kiriSambaQuantity=$request['kiriSamba'];
        $type="Suvadal";
        $suvadalQuantity=$request['suvadal'];
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
                ->where('type', "Nadu")
                ->update(['QuantityinKg' => $p->QuantityinKg-$naduQuantity]);
            DB::table('paddystock')
                ->where('type', "RedSamba")
                ->update(['QuantityinKg' => $p->QuantityinKg-$redSambaQuantity]);
            DB::table('paddystock')
                ->where('type', "RedNadu")
                ->update(['QuantityinKg' => $p->QuantityinKg-$redNaduQuantity]);
            DB::table('paddystock')
                ->where('type', "KiriSamba")
                ->update(['QuantityinKg' => $p->QuantityinKg-$kiriSambaQuantity]);
            DB::table('paddystock')
                ->where('type', "Suvadal")
                ->update(['QuantityinKg' => $p->QuantityinKg-$suvadalQuantity]);
             DB::table('paddystock')
                 ->update(['updated_at' => date("Y/m/d")]);
        }
        return redirect()->route('PaddyStock');
    }

}