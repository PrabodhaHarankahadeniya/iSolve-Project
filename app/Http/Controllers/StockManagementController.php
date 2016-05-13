<?php
namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StockManagementcontroller extends controller
{
    public function postPaddyStock(){
        return redirect()->route('PaddyStock');

    }
    public function postRiceStock(){
        return redirect()->route('RiceStock');

    }
    public function postFlourStock(){
        return redirect()->route('FlourStock');

    }
    public function postTodayRecords(){
        return redirect()->route('TodayRecords');

    }
    public function postStockExchange(){
        return redirect()->route('StockExchange');

    }

    /*public function linkPaddyStock(Request $request){
        $paddy=\DB::table('paddystock')->get();
        $samba = $request['samba'];
            foreach ($paddy as $p) {
                if (Auth::attempt(['Type' => $samba])) {
                    DB::table('ricestock')
                        ->where('Type', "Samba")
                        ->update(['QuantityinKg' => $samba]);
                }
            }
        return view('PaddyStocktoRiceMill');

    }*/
    public function getRiceStock(){
        $rice=\DB::table('ricestock')->get();
        return view('RiceStock',compact('rice'));
    }
    public function getPaddyStock(){
        $paddy=\DB::table('paddystock')->get();
        return view('PaddyStock',compact('paddy'));
    }
    public function getFlourStock(){
        $flour=\DB::table('flourstock')->get();
        return view('FlourStock',compact('flour'));
    }
    public function getTodayRecords(){
        return view('TodayRecords');
        }
    public function getStockExchange(){
        return view('StockExchange');
    }
    public function getPaddyStocktoRiceMill(){
        return view('PaddyStocktoRiceMill');

    }
    public function getRiceMilltoRiceStock(){
        return view('RiceMilltoRiceStock');

    }
    public function getRiceStocktoFlourMill(){
        return view('RiceStocktoFlourMill');

    }
    public function getFlourMilltoFlourStock(){
        return view('FlourMilltoFlourStock');

    }
}