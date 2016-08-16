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
                $flag = 1;
                $p = \DB::table('rice_stock')->where('type', $type)->value('quantity_in_kg');
                if ($p < $tempQuantity) {
                    $error = "Rice stock can't satisfy those requirements..............!!!";
                    return view('stockManagement.RiceStocktoFlourMill', compact('error'));
                }
            }
        }
        foreach ($riceTypes as $temp) {
            $type = $temp;
            $tempQuantity = $request[$temp];
            if ($tempQuantity != null) {
                $p = \DB::table('rice_stock')->where('type', $type)->value('quantity_in_kg');
                \DB::table('rice_stock')
                    ->where('type', $type)
                    ->update(['quantity_in_kg' => $p - $tempQuantity]);
                $riceEntry = new RiceEntry();
                $riceEntry->type = $type;
                $riceEntry->quantity_in_kg = $tempQuantity;
                $riceEntry->date =$request['date'];
                $riceEntry->transfer_status = "remove";
                $riceEntry->save();
            }
        }
        if($flag==0) {
            return redirect()->back();
        }
        else{
            DB::table('rice_stock')
                ->update(['updated_at' => $request['date']]);
            return redirect()->route('RiceStock');
        }
    }

    public function addrice(Request $request){
        $this->validate($request,[
            'date'=>'required',
        ]);
        $flag=0;
        $riceTypes=['Samba','Nadu','RedSamba','RedNadu','KiriSamba','Suvadal','KekuluSamba','SuduKekulu','Kekulu','RedKekulu','KekuluKiri'];
        foreach ($riceTypes as $temp) {
            $type = $temp;
            $tempQuantity = $request[$temp];
            if ($tempQuantity != 0) {
                $flag=1;
                $p = \DB::table('rice_stock')->where('type', $type)->value('quantity_in_kg');
                $riceEntry = new RiceEntry();
                $riceEntry->type = $type;
                $riceEntry->quantity_in_kg = $tempQuantity;
                $riceEntry->date =$request['date'];
                $riceEntry->transfer_status = "add";
                $riceEntry->save();

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
                ->update(['updated_at' => $request['date']]);
            return redirect()->route('RiceStock');
        }
    }


}