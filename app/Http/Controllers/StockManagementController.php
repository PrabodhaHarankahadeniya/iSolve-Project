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
}