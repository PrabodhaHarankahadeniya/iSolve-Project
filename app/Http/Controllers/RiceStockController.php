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
        $riceTypes=['Samba','Nadu','RedSamba','RedNadu','KiriSamba','Suvadal'];
        foreach ($riceTypes as $temp) {
            $type = $temp;
            $tempQuantity = $request[$temp];
            $p = \DB::table('ricestock')->where('type', $type)->value('quantity_in_kg');
            //validation
            $this->validate($request, [
                $type => 'Integer',
            ]);
            if ($p > $tempQuantity) {
                \DB::table('ricestock')
                    ->where('type', $type)
                    ->update(['QuantityinKg' => $p - $tempQuantity]);

                DB::table('rice_removals')
                    ->insert(['type' => $type, 'quantity_in_kg' => $tempQuantity]);
                $flag = $tempQuantity / 5;
                for ($i = 0; $i < $flag; $i = $i + 1) {
                    $rice = new Rice();
                    $rice->Type = $type;
                    $rice->QuantityinKg = 5;
                    //array_remove(PaddyStock::getPaddyList(),$type,$paddy);
                }


            } else {
                $error="Rice stock can't satisfy those requirements..............!!!";
                return view('stockManagement.RiceStocktoRiceMill',compact('error'));
            }
        }
        DB::table('ricestock')
            ->update(['updated_at' => date("Y/m/d")]);
        return redirect()->route('Ricetock');
    }

    public function addrice(Request $request){


        $riceTypes=['Samba','Nadu','RedSamba','RedNadu','KiriSamba','Suvadal'];
        foreach ($riceTypes as $temp) {
            $type = $temp;
            $tempQuantity = $request[$temp];
            $flag=0;
            if ($tempQuantity != null) {
                $flag=1;
                $p = \DB::table('ricestock')->where('type', $type)->value('quantity_in_kg');
                //validation
                $this->validate($request, [
                    $type => 'Integer',
                ]);
                DB::table('rice_additions')
                    ->insert(['type' => $type, 'quantity_in_kg' => $tempQuantity]);

                $flag = $tempQuantity / 5;
                for ($i = 0; $i < $flag; $i = $i + 1) {
                    $rice = new Rice();
                    $rice->Type = $type;
                    $rice->QuantityinKg = 5;
                    array_add(RiceStock::getRiceList(), $type, $rice);
                }
                \DB::table('ricestock')
                    ->where('type', $type)
                    ->update(['QuantityinKg' => $p + $tempQuantity]);
            }
        }
        if($flag=1) {
            DB::table('ricestock')
                ->update(['updated_at' => date("Y/m/d")]);
            return redirect()->back();
        }
        return redirect()->route('RiceStock');
    }


}