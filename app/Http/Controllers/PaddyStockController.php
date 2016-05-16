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
            $p = \DB::table('paddy_stock')->where('type', $type)->value('quantity_in_kg');
            //validation
            $this->validate($request, [
                $type => 'Integer',
            ]);
            if ($p >= $tempQuantity) {
                \DB::table('paddy_stock')
                    ->where('type', $type)
                    ->update(['quantity_in_kg' => $p - $tempQuantity]);

                DB::table('paddy_removals')
                    ->insert(['type' => $type, 'quantity_in_kg' => $tempQuantity]);
                $flag = $tempQuantity / 5;
                for ($i = 0; $i < $flag; $i = $i + 1) {
                    $paddy = new Paddy();
                    //$paddy->Type = $type;
                    //$paddy->QuantityinKg = 5;
                    //array_remove(PaddyStock::getPaddyList(),$type,$paddy);
                }


            } else {
                $error="Paddy stock can't satisfy those requirements..............!!!";
                return view('stockManagement.PaddyStocktoRiceMill',compact('error'));
            }
        }
        DB::table('paddy_stock')
            ->update(['updated_at' => date("Y/m/d")]);
        return redirect()->route('PaddyStock');
    }

    public function addPaddy(Request $request){


        $paddyTypes=['Samba','Nadu','RedSamba','RedNadu','KiriSamba','Suvadal'];
        $flag=0;
        foreach ($paddyTypes as $temp) {
            $type = $temp;
            $tempQuantity = $request[$temp];
            if ($tempQuantity != null) {
                $flag=1;
                $p = \DB::table('paddy_stock')->where('type', $type)->value('quantity_in_kg');
                //validation
                $this->validate($request, [
                    $type => 'Integer',
                ]);
                DB::table('paddy_additions')
                    ->insert(['type' => $type, 'quantity_in_kg' => $tempQuantity]);

                $div = $tempQuantity / 5;
                for ($i = 0; $i < $div; $i = $i + 1) {
                    $paddy = new Paddy();
                    //$paddy->Type = $type;
                    //$paddy->QuantityinKg = 5;
                    array_add(PaddyStock::getPaddyList(), $type, $paddy);
                }
                \DB::table('paddy_stock')
                    ->where('type', $type)
                    ->update(['quantity_in_kg' => $p + $tempQuantity]);
            }
        }
        if($flag==0) {
            DB::table('paddy_stock')
                ->update(['updated_at' => date("Y/m/d")]);
            return redirect()->back();
        }
        return redirect()->route('PaddyStock');
    }

}