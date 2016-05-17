<?php
namespace App\Http\Controllers;

use Faker\Provider\DateTime;
use DB;
use App\RiceEntry;
use App\RiceMill;
use App\RiceStock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RiceStockcontroller extends controller
{

    public function getRice(Request $request){
        $flag=0;
        $riceTypes=['Samba','Nadu','RedSamba','RedNadu','KiriSamba','Suvadal','KekuluSamba','SuduKekulu','Kekulu','RedKekulu','KekuluKiri'];
        foreach ($riceTypes as $temp) {
            $type = $temp;
            $tempQuantity = $request[$temp];
            if ($tempQuantity != null) {
                $p = \DB::table('rice_stock')->where('type', $type)->value('quantity_in_kg');
            if ($p > $tempQuantity) {
                \DB::table('rice_stock')
                    ->where('type', $type)
                    ->update(['quantity_in_kg' => $p - $tempQuantity]);
                $RiceEntry = new RiceEntry();
                $RiceEntry->type = $type;
                $RiceEntry->quantity_in_kg = $tempQuantity;
                $RiceEntry->transfer_status = "remove";
                $RiceEntry->save();
            } else
            {
                $error="Rice stock can't satisfy those requirements..............!!!";
                return view('stockManagement.RiceStocktoFlourMill',compact('error'));
            }
            }
        }
        if($flag==0) {
            return redirect()->back();
        }
        else{
            DB::table('rice_stock')
                ->update(['updated_at' => date("Y.m.d")]);
            return redirect()->route('RiceStock');
        }
    }

    public function addrice(Request $request){
        $flag=0;
        $riceTypes=['Samba','Nadu','RedSamba','RedNadu','KiriSamba','Suvadal','KekuluSamba','SuduKekulu','Kekulu','RedKekulu','KekuluKiri'];
        foreach ($riceTypes as $temp) {
            $type = $temp;
            $tempQuantity = $request[$temp];
            if ($tempQuantity != 0) {
                $flag=1;
                $p = \DB::table('rice_stock')->where('type', $type)->value('quantity_in_kg');
                $RiceEntry = new RiceEntry();
                $RiceEntry->type = $type;
                $RiceEntry->quantity_in_kg = $tempQuantity;
                $RiceEntry->transfer_status = "add";
                $RiceEntry->save();

                \DB::table('rice_stock')
                    ->where('type', $type)
                    ->update(['quantity_in_kg' => $p + $tempQuantity]);
            }
        }
        if($flag==0) {
            return redirect()->back();
        }
        else{
            DB::table('rice_stock')
                ->update(['updated_at' => date("Y.m.d")]);
            return redirect()->route('RiceStock');
        }
    }


}