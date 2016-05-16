<?php
namespace App\Http\Controllers;

use Faker\Provider\DateTime;
use DB;
use App\Flour;
use App\RiceMill;
use App\FlourStock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FlourStockcontroller extends controller
{
    public function getFlour(Request $request){
        $flourTypes=['Samba','Nadu','RedSamba','RedNadu','KiriSamba','Suvadal'];
        foreach ($flourTypes as $temp) {
            $type = $temp;
            $tempQuantity = $request[$temp];
            $p = \DB::table('flour_stock')->where('type', $type)->value('quantity_in_kg');
            //validation
            $this->validate($request, [
                $type => 'Integer',
            ]);
            if ($p >= $tempQuantity) {
                \DB::table('flour_stock')
                    ->where('type', $type)
                    ->update(['quantity_in_kg' => $p - $tempQuantity]);

                DB::table('flour_removals')
                    ->insert(['type' => $type, 'quantity_in_kg' => $tempQuantity,'created_at' => date("Y/m/d"),'updated_at' => date("Y/m/d")]);
                $flag = $tempQuantity / 5;
                for ($i = 0; $i < $flag; $i = $i + 1) {
                    $flour = new Flour();
                    $flour->type = $type;
                    $flour->QuantityinKg = 5;
                    //array_forget(PaddyStock::getPaddyList(),$type);
                }


            } else {
                $error="Flour stock can't satisfy those requirements..............!!!";
                return view('stockManagement.FlourStocktoRiceMill',compact('error'));
            }
        }
        DB::table('flour_stock')
            ->update(['updated_at' => date("Y/m/d")]);
        return redirect()->route('FlourStock');
    }

    public function addFlour(Request $request){


        $flourTypes=['WhiteRiceFloor','RedKekuluFloor'];
        $flag=0;
        foreach ($flourTypes as $temp) {
            $type = $temp;
            $tempQuantity = $request[$temp];
            if ($tempQuantity != null) {
                $flag=1;
                $p = \DB::table('flour_stock')->where('type', $type)->value('quantity_in_kg');
                //validation
                $this->validate($request, [
                    $type => 'Integer',
                ]);
                DB::table('flour_additions')
                    ->insert(['type' => $type, 'quantity_in_kg' => $tempQuantity,'created_at' => date("Y/m/d"),'updated_at' => date("Y/m/d")]);

                $div = $tempQuantity / 5;
                for ($i = 0; $i < $div; $i = $i + 1) {
                    $flour = new Flour();
                    $flour->Type = $type;
                    $flour->QuantityinKg = 5;
                    array_add(FlourStock::getFlourList(), $type, $flour);
                }
                \DB::table('flour_stock')
                    ->where('type', $type)
                    ->update(['quantity_in_kg' => $p + $tempQuantity]);
            }
        }
        if($flag==0) {
            DB::table('flour_stock')
                ->update(['updated_at' => date("Y/m/d")]);
            return redirect()->back();
        }
        return redirect()->route('FlourStock');
    }

}