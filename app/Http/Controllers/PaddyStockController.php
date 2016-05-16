<?php
namespace App\Http\Controllers;

use Faker\Provider\DateTime;
use DB;
use App\Paddy;
use App\Administrator;
use App\PaddyStock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaddyStockcontroller extends controller
{
    public function getPaddy(Request $request){
        $paddyTypes=['Samba','Nadu','RedSamba','RedNadu','KiriSamba','Suvadal'];
        foreach ($paddyTypes as $temp) {
            $type = $temp;
            $tempQuantity = $request[$temp];
            $p = \DB::table('paddystock')->where('type', $type)->value('QuantityinKg');
            //validation
            $this->validate($request, [
                $type => 'Integer',
            ]);
            if ($p > $tempQuantity) {
                \DB::table('paddystock')
                    ->where('type', $type)
                    ->update(['QuantityinKg' => $p - $tempQuantity]);

                DB::table('paddy_removals')
                    ->insert(['type' => $type, 'quantity_in_kg' => $tempQuantity]);
                $flag = $tempQuantity / 5;
                for ($i = 0; $i < $flag; $i = $i + 1) {
                    $paddy = new Paddy();
                    $paddy->Type = $type;
                    $paddy->QuantityinKg = 5;
                    //array_remove(PaddyStock::getPaddyList(),$type,$paddy);
                }


            } else {
                $error="Paddy stock can't satisfy those requirements..............!!!";
                return view('stockManagement.PaddyStocktoRiceMill',compact('error'));
            }
        }
        DB::table('paddystock')
            ->update(['updated_at' => date("Y/m/d")]);
        return redirect()->route('PaddyStock');
    }

    public function addPaddy(Request $request){


        $paddyTypes=['Samba','Nadu','RedSamba','RedNadu','KiriSamba','Suvadal'];
        foreach ($paddyTypes as $temp) {
            $type = $temp;
            $tempQuantity = $request[$temp];
            $flag=0;
            if ($tempQuantity != null) {
                $flag=1;
                $p = \DB::table('paddystock')->where('type', $type)->value('QuantityinKg');
                //validation
                $this->validate($request, [
                    $type => 'Integer',
                ]);
                DB::table('paddy_additions')
                    ->insert(['type' => $type, 'quantity_in_kg' => $tempQuantity]);

                $flag = $tempQuantity / 5;
                for ($i = 0; $i < $flag; $i = $i + 1) {
                    $paddy = new Paddy();
                    $paddy->Type = $type;
                    $paddy->QuantityinKg = 5;
                    array_add(PaddyStock::getPaddyList(), $type, $paddy);
                }
                \DB::table('paddystock')
                    ->where('type', $type)
                    ->update(['QuantityinKg' => $p + $tempQuantity]);
            }
        }
        if($flag=1) {
            DB::table('paddystock')
                ->update(['updated_at' => date("Y/m/d")]);
            return redirect()->back();
        }
        return redirect()->route('PaddyStock');
    }

}