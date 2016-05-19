<?php
namespace App\Http\Controllers;

use DB;
use App\PaddyEntry;
use App\Administrator;
use App\PaddyStock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaddyStockcontroller extends controller
{
    public function getPaddy(Request $request){
        $flag=0;
        $paddyTypes=['Samba','Nadu','RedSamba','RedNadu','KiriSamba','Suvadal'];
        foreach ($paddyTypes as $temp) {
            $type = $temp;
            $tempQuantity = $request[$temp];
            if ($tempQuantity != null) {
                $flag=1;
                $p = \DB::table('paddy_stock')->where('type', $type)->value('quantity_in_kg');
            if ($p >= $tempQuantity) {
                \DB::table('paddy_stock')
                    ->where('type', $type)
                    ->update(['quantity_in_kg' => $p - $tempQuantity]);
                $paddyEntry = new PaddyEntry();
                $paddyEntry->type = $type;
                $paddyEntry->quantity_in_kg = $tempQuantity;
                $paddyEntry->transfer_status = "remove";
                $paddyEntry->date =$request['date'];
                $paddyEntry->save();
            }
            else {
                $error="Paddy stock can't satisfy those requirements..............!!!";
                return view('stockManagement.PaddyStocktoRiceMill',compact('error'));
            }

            }
        }
        if($flag==0) {
            return redirect()->back();
        }
        else{
            DB::table('paddy_stock')
                ->update(['updated_at' => $request['date']]);
            return redirect()->route('PaddyStock');
        }

    }

    public function addPaddy(Request $request){
        $paddyTypes=['Samba','Nadu','Red Samba','RedNadu','KiriSamba','Suvadal'];
        $flag=0;
        foreach ($paddyTypes as $temp) {
            $type = $temp;
            $tempQuantity = $request[$temp];
            if ($tempQuantity != null) {
                $flag=1;
                $p = \DB::table('paddy_stock')->where('type', $type)->value('quantity_in_kg');
                $paddyEntry = new PaddyEntry();
                $paddyEntry->type = $type;
                $paddyEntry->quantity_in_kg = $tempQuantity;
                $paddyEntry->transfer_status = "add";
                $paddyEntry->date =$request['date'];
                $paddyEntry->save();

                \DB::table('paddy_stock')
                    ->where('type', $type)
                    ->update(['quantity_in_kg' => $p + $tempQuantity]);
            }
        }
        if($flag==0) {
            return redirect()->back();
        }
        else{
            DB::table('paddy_stock')
                ->update(['updated_at' => $request['date']]);
            return redirect()->route('PaddyStock');
        }

    }

}