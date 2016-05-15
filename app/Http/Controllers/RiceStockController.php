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
    public function getRice(Request $request){
        //validation
        $type="Samba";
        $sambaQuantity=$request['samba'];
        $temp=$sambaQuantity/5;
        for($i=0;$i<$temp;$i=$i+1){
            $rice=new Rice();
            $rice->Type= $type;
            $rice->QuantityinKg=5;
            array_add(RiceStock::getRiceList(),"samba",$rice);
        }
        $type="Nadu";
        $naduQuantity=$request['nadu'];
        $temp=$naduQuantity/5;
        for($i=0;$i<$temp;$i=$i+1){
            $rice=new Rice();
            $rice->Type= $type;
            $rice->QuantityinKg=5;
            array_add(RiceStock::getRiceList(),"samba",$rice);
        }
        $type="RedSamba";
        $redSambaQuantity=$request['redSamba'];
        $type="RedNadu";
        $redNaduQuantity=$request['redNadu'];
        $type="KiriSamba";
        $kiriSambaQuantity=$request['kiriSamba'];
        $type="Suvadal";
        $suvadalQuantity=$request['suvadal'];
        $rice=new Rice();
        $rice->Type= $type;
        $rice->QuantityinKg=$sambaQuantity;
        array_add(RiceStock::getRiceList(),"samba",$rice);
        $rice=\DB::table('rice')->get();
        foreach ($rice as $p) {
            DB::table('rice')
                ->where('type', "Samba")
                ->update(['QuantityinKg' => $p->QuantityinKg-$sambaQuantity]);
            DB::table('rice')
                ->where('type', "Nadu")
                ->update(['QuantityinKg' => $p->QuantityinKg-$naduQuantity]);
            DB::table('rice')
                ->where('type', "RedSamba")
                ->update(['QuantityinKg' => $p->QuantityinKg-$redSambaQuantity]);
            DB::table('rice')
                ->where('type', "RedNadu")
                ->update(['QuantityinKg' => $p->QuantityinKg-$redNaduQuantity]);
            DB::table('rice')
                ->where('type', "KiriSamba")
                ->update(['QuantityinKg' => $p->QuantityinKg-$kiriSambaQuantity]);
            DB::table('rice')
                ->where('type', "Suvadal")
                ->update(['QuantityinKg' => $p->QuantityinKg-$suvadalQuantity]);
            DB::table('rice')
                ->where('type', "Suvadal")
                ->update(['updated_at' => date_time_set("Y/m/d","h-mi-sa")]);
        }
        return redirect()->route('RiceStock');
    }

}