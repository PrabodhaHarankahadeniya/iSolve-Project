<?php
namespace App\Http\Controllers;

use App\PaddyStock;
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

    public function getRiceStock(){
        RiceStock::getRiceStock();
        $rice=\DB::table('rice')->get();
        return view('RiceStock',compact('rice'));
    }
    public function getPaddyStock(){
        PaddyStock::getPaddyStock();
        $paddy=\DB::table('paddystock')->get();
        return view('PaddyStock',compact('paddy'));
    }
    public function getFlourStock(){
        FlourStock::getFlourStock();
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