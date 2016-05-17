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
        $flag=0;
        $flourTypes=['WhiteRiceFloor','RedKekuluFloor'];
        foreach ($flourTypes as $temp) {
            $type = $temp;
            $tempQuantity = $request[$temp];
            if ($tempQuantity != null) {
                $flag=1;
                $p = \DB::table('flour_stock')->where('type', $type)->value('quantity_in_kg');
                if ($p >= $tempQuantity) {
                    \DB::table('flour_stock')
                        ->where('type', $type)
                        ->update(['quantity_in_kg' => $p - $tempQuantity]);

                    DB::table('flour_removals')
                        ->insert(['type' => $type, 'quantity_in_kg' => $tempQuantity, 'created_at' => date("Y/m/d"), 'updated_at' => date("Y/m/d")]);

                } else {
                    $error = "Flour stock can't satisfy those requirements..............!!!";
                    return view('stockManagement.getFlourfromStock', compact('error'));
                }
            }
        }
        if($flag==0) {
            return redirect()->back();
        }
        else {
            DB::table('flour_stock')
                ->update(['updated_at' => date("Y.m.d")]);
            return redirect()->route('FlourStock');
        }
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
                DB::table('flour_additions')
                    ->insert(['type' => $type, 'quantity_in_kg' => $tempQuantity,'created_at' => date("Y/m/d"),'updated_at' => date("Y/m/d")]);
                \DB::table('flour_stock')
                    ->where('type', $type)
                    ->update(['quantity_in_kg' => $p + $tempQuantity]);
            }
        }
        if($flag==0) {
            return redirect()->back();
        }
        else {
            DB::table('flour_stock')
                ->update(['updated_at' => date("Y.m.d")]);
            return redirect()->route('FlourStock');
        }
    }

}