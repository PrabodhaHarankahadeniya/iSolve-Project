<?php
namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StockManagementcontroller extends controller
{
    public function postPaddyStock(){
        return view('PaddyStock');
        //return redirect()->route('PaddyStock');

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
        return view('RiceStock');
    }
    public function getPaddyStock(){
        return view('PaddyStock');
    }
    public function getFlourStock(){
        return view('FlourStock');
    }
    public function getTodayRecords(){
        return view('TodayRecords');
        }
    public function getStockExchange(){
        return view('StockExchange');
    }
}